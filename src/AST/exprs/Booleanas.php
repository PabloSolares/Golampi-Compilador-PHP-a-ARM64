<?php

namespace App\Ast\exprs;

use App\ARM\Instruction;
use Context\RatExprContext;
use Context\AndExprContext;
use Context\OrExprContext;
use Context\UnaryNotContext;
use App\Env\Result;
use Context\BreakStmContext;
use Context\ContinueStmContext;
use Context\RangeExprContext;
use Context\RangeNotExprContext;





trait Booleanas
{
    public function visitRatExpr(RatExprContext $ctx)
    {
        $left = $this->visit($ctx->expression_rational());
        $right = $this->visit($ctx->expression_arithmetic());
        $op = $ctx->getChild(1)->getText();

        if ($left->tipo === "nil" && $right->tipo === "nil") {
            if ($op === '==' || $op === '!=') {
                $this->stack->popVal("xzr"); // sacar de la pila
                $this->stack->popVal("xzr"); 
                
                $this->asmGenerador->mov("x9", "xzr");
                $this->stack->pushVal("x9");
                return Result::stack("nil", $this->stack->getStackOff());
            } else {
                $this->addErr("Error Semantico: Operacion '$op' no permitida entre 'nil' y 'nil'", $ctx);
                $this->stack->popVal("xzr"); 
                $this->stack->popVal("xzr");
                $this->stack->pushIn(0);
                return Result::stack(Result::BOOL, $this->stack->getStackOff());
            }
        }

        $t1 = ($left->tipo === Result::CHAR) ? Result::INT : $left->tipo;
        $t2 = ($right->tipo === Result::CHAR) ? Result::INT : $right->tipo;
        
        $esNumerico = in_array($t1, [Result::INT, Result::FLOAT]) && in_array($t2, [Result::INT, Result::FLOAT]);
        $esCadena = ($t1 === Result::STRING && $t2 === Result::STRING);
        $esBool = ($t1 === Result::BOOL && $t2 === Result::BOOL && in_array($op, ['==', '!=']));
        
        $esPuntero = ((str_contains((string)$t1, "_ptr") || $t1 === "nil") && 
                      (str_contains((string)$t2, "_ptr") || $t2 === "nil")) && 
                      in_array($op, ['==', '!=']);

        if (!$esNumerico && !$esCadena && !$esBool && !$esPuntero) {
            $this->addErr("Error Semantico: Incompatible operacion '$op' entre '" . $left->tipo . "' y '" . $right->tipo . "'", $ctx);
            $this->stack->popVal("xzr"); 
            $this->stack->popVal("xzr");
            $this->stack->pushIn(0);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }

        $this->asmGenerador->comment("Relacional: $op");
        $rightReg = $this->stack->popVal("x10");
        $leftReg = $this->stack->popVal("x11");

        // si hay al menos un float
        if ($esNumerico && ($t1 === Result::FLOAT || $t2 === Result::FLOAT)) {
            if ($t1 === Result::INT) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", "w11");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w11");
            }

            if ($t2 === Result::INT) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s1", "w10");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s1", "w10");
            }
            $this->asmGenerador->instrucciones[] = new Instruction("fcmp", "s0", "s1");
        
        // si es entero, bool, char, puntero o nil
        } else {
            $this->asmGenerador->cmp("x11", "x10");
        }

        switch ($op) {
            case '<':  $this->asmGenerador->cset("x9", "lt"); break;
            case '<=': $this->asmGenerador->cset("x9", "le"); break;
            case '>':  $this->asmGenerador->cset("x9", "gt"); break;
            case '>=': $this->asmGenerador->cset("x9", "ge"); break;
            case '==': $this->asmGenerador->cset("x9", "eq"); break;
            case '!=': $this->asmGenerador->cset("x9", "ne"); break;
        }

        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOff());
    }

    public function visitAndExpr(AndExprContext $ctx){
        $left = $this->visit($ctx->logicAnd());
        $right = $this->visit($ctx->expression_rational());

        if ($left->tipo !== Result::BOOL || $right->tipo !== Result::BOOL) {
            $this->addErr("Error Semantico: && espera 'bool', se recibio '" . $left->tipo . "' y '" . $right->tipo . "'", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }

        $this->asmGenerador->comment("Logico: AND && ");

        $rightReg = $this->stack->popVal("x10");
        $leftReg = $this->stack->popVal("x11");

        $this->asmGenerador->and_op("x9", "x11", "x10");
        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOff());

    }

    public function visitOrExpr(OrExprContext $ctx){
        $left = $this->visit($ctx->logicOr());
        $right = $this->visit($ctx->logicAnd());

        if ($left->tipo !== Result::BOOL || $right->tipo !== Result::BOOL) {
            $this->addErr("Error Semantico: || espera 'bool', se recibio '" . $left->tipo . "' y '" . $right->tipo . "'", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }
        $this->asmGenerador->comment("Logico: OR || ");

        $rightReg = $this->stack->popVal("x10");
        $leftReg = $this->stack->popVal("x11");

        $this->asmGenerador->orr("x9", "x11", "x10");
        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOff());

    }

    public function visitUnaryNot(UnaryNotContext $ctx){
        $operand = $this->visit($ctx->factor());

        if ($operand->tipo !== Result::BOOL) {
            $this->addErr("Error Semantico: ! espera 'bool', se recibio '" . $operand->tipo . "'", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }

        $this->asmGenerador->comment("Logico: NOT ! ");
        $opReg = $this->stack->popVal("x10");
        $this->asmGenerador->cmp("x10", "xzr");
        $this->asmGenerador->cset("x9", "eq");
        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOff());
    }

    public function visitBreakStm(BreakStmContext $ctx) {
        if (empty($this->loopStack)) {
            $this->addErr("Error Semantico: 'break' fuera de un ciclo.");
            return Result::buildVacio();
        }

        $currentLoop = end($this->loopStack);
        $this->asmGenerador->b($currentLoop['end']);
        
        return Result::buildVacio();
    }

    public function visitContinueStm(ContinueStmContext $ctx) {
        if (empty($this->loopStack)) {
            $this->addErr("Error Semantico: 'continue' fuera de un ciclo.");
            return Result::buildVacio();
        }

        $currentLoop = end($this->loopStack);
        $this->asmGenerador->b($currentLoop['continue']);
        
        return Result::buildVacio();
    }

    public function visitRangeExpr(RangeExprContext $ctx){
        $left = $this->visit($ctx->expression_arithmetic());
        $min = $this->visit($ctx->expression(0));
        $max = $this->visit($ctx->expression(1));

        if($left->tipo !== Result::INT || $min->tipo !== Result::INT || $max->tipo !== Result::INT ){
            // tiene que ser int
        }

        $this->asmGenerador->comment("-- Comparacion por rango --- ");

        $maxReg = $this->stack->popVal("x13");
        $minReg = $this->stack->popVal("x12");
        $leftReg = $this->stack->popVal("x11");

        $this->asmGenerador->instrucciones[] = new Instruction("cmp", $leftReg, $minReg);
        $this->asmGenerador->instrucciones[] = new Instruction("cset", "x9", "ge");

        $this->asmGenerador->instrucciones[] = new Instruction("cmp", $leftReg, $maxReg);
        $this->asmGenerador->instrucciones[] = new Instruction("cset", "x10", "le");

        $this->asmGenerador->instrucciones[] = new Instruction("and", "x9", "x9", "x10");

        $this->stack->pushVal("x9");

        return Result::stack(Result::BOOL, $this->stack->getStackOff());
    }

    public function visitRangeNotExpr(RangeNotExprContext $ctx){
        $left = $this->visit($ctx->expression_arithmetic());
        $min = $this->visit($ctx->expression(0));
        $max = $this->visit($ctx->expression(1));

        if($left->tipo !== Result::INT || $min->tipo !== Result::INT || $max->tipo !== Result::INT ){
            // tiene que ser int
        }

        $this->asmGenerador->comment("-- Comparacion por rango --- ");

        $maxReg = $this->stack->popVal("x13");
        $minReg = $this->stack->popVal("x12");
        $leftReg = $this->stack->popVal("x11");

        $this->asmGenerador->instrucciones[] = new Instruction("cmp", $leftReg, $minReg);
        $this->asmGenerador->instrucciones[] = new Instruction("cset", "x9", "lt");

        $this->asmGenerador->instrucciones[] = new Instruction("cmp", $leftReg, $maxReg);
        $this->asmGenerador->instrucciones[] = new Instruction("cset", "x10", "gt");

        $this->asmGenerador->instrucciones[] = new Instruction("orr", "x9", "x9", "x10");

        $this->stack->pushVal("x9");

        return Result::stack(Result::BOOL, $this->stack->getStackOff());
    }

    
}
