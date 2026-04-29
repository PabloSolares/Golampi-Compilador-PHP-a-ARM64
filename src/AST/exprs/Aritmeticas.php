<?php

namespace App\AST\exprs;

use App\ARM\Instruction;
use Context\AddSubExprContext;
use Context\MultDivModExprContext;
use Context\UnaryMinusContext;
use App\Env\Result;

trait Aritmeticas
{

    public function obtenerTipoOperacion($izq, $der, $operador){
        // si es rune que lo detecte como int 
        $t1 = ($izq == Result::CHAR) ? Result::INT : $izq;
        $t2 = ($der == Result::CHAR) ? Result::INT : $der;

        if($operador === '+'){
            if ($t1 === Result::INT && $t2 === Result::INT) return Result::INT;
            if ($t1 === Result::FLOAT && $t2 === Result::FLOAT) return Result::FLOAT;
            if (($t1 === Result::INT && $t2 === Result::FLOAT) || ($t1 === Result::FLOAT && $t2 === Result::INT)) return Result::FLOAT;
            if ($t1 === Result::STRING && $t2 === Result::STRING) return Result::STRING;
            return Result::NULO;
        }

        if (in_array($operador, ['-', '*', '/'])) {
            if ($t1 === Result::INT && $t2 === Result::INT) return Result::INT;
            if ($t1 === Result::FLOAT && $t2 === Result::FLOAT) return Result::FLOAT;
            if (($t1 === Result::INT && $t2 === Result::FLOAT) || ($t1 === Result::FLOAT && $t2 === Result::INT)) return Result::FLOAT;
            return Result::NULO;
        }


        if ($operador === '%') {
            if ($t1 === Result::INT && $t2 === Result::INT) return Result::INT;
            return Result::NULO;
        }

        if (in_array($operador, ['==', '!=', '>', '<', '>=', '<='])) {
            if (in_array($t1, [Result::INT, Result::FLOAT]) && in_array($t2, [Result::INT, Result::FLOAT])) return Result::BOOL;
            if ($t1 === Result::STRING && $t2 === Result::STRING) return Result::BOOL;
            if ($t1 === Result::BOOL && $t2 === Result::BOOL && in_array($operador, ['==', '!='])) return Result::BOOL;
            return Result::NULO;
        }

        return Result::NULO;

    }

    public function visitAddSubExpr(AddSubExprContext $ctx) {
        $left = $this->visit($ctx->expression_arithmetic()); 
        $right = $this->visit($ctx->term());  

        
        $op = $ctx->getChild(1)->getText();

        $tipoFinal = $this->obtenerTipoOperacion($left->tipo, $right->tipo, $op);

        if ($tipoFinal === Result::NULO) {
            $this->addErr("Error Semantico: Incompatibilidad de tipos. No se puede operar '" . $left->tipo . "' $op '" . $right->tipo . "'", $ctx);
            $this->stack->pushIn(0); 
            return Result::stack(Result::NULO, $this->stack->getStackOff());
        }

        $this->asmGenerador->comment("Aritmetica: $op ($tipoFinal)");
        $rightReg = $this->stack->popVal("x10"); 
        $leftReg = $this->stack->popVal("x11");  


        if($tipoFinal === Result::FLOAT){

            if($left->tipo === Result::INT || $left->tipo === Result::CHAR){
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", "w11");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w11");
            }

            if ($right->tipo === Result::INT || $right->tipo === Result::CHAR) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s1", "w10");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s1", "w10");
            }


            if ($op === '+') {
                $this->asmGenerador->instrucciones[] = new Instruction("fadd", "s2", "s0", "s1");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fsub", "s2", "s0", "s1");
            }

            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s2");
            

        } else if ($tipoFinal === Result::INT){
            if ($op === '+') {
                $this->asmGenerador->add("x9", $leftReg, $rightReg);
            } else if ($op === '-') {
                $this->asmGenerador->sub("x9", $leftReg, $rightReg);
            }

            $this->stack->pushVal("x9");
            return Result::stack(Result::INT, $this->stack->getStackOff());
        } else if($tipoFinal === Result::STRING && $op === '+'){
            $this->asmGenerador->comment("Concatenacion de cadenas");
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x0", "x11");
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x1", "x10");
            $this->asmGenerador->instrucciones[] = new Instruction("bl", "concat_strings");
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x9", "x0");
        }

        $this->stack->pushVal("x9");
        return Result::stack($tipoFinal, $this->stack->getStackOff());
    }

    public function visitMultDivModExpr(MultDivModExprContext $ctx) {
        $left = $this->visit($ctx->term());   
        $right = $this->visit($ctx->factor()); 
        
        $op = $ctx->getChild(1)->getText();

        $tipoFinal = $this->obtenerTipoOperacion($left->tipo, $right->tipo, $op);

        if ($tipoFinal === Result::NULO) {
            $this->addErr("Error Semantico: No se puede operar '" . $left->tipo . "' $op '" . $right->tipo . "'", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::NULO, $this->stack->getStackOff());
        }



        $this->asmGenerador->comment("Aritmetica: $op ($tipoFinal)");

        $rightReg = $this->stack->popVal("x10");
        $leftReg = $this->stack->popVal("x11");

        if ($tipoFinal === Result::FLOAT) {
            if ($left->tipo === Result::INT || $left->tipo === Result::CHAR) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", "w11");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w11");
            }

            if ($right->tipo === Result::INT || $right->tipo === Result::CHAR) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s1", "w10");
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s1", "w10");
            }

            if ($op === '*') {
                $this->asmGenerador->instrucciones[] = new Instruction("fmul", "s2", "s0", "s1");
            } else if ($op === '/') {
                $this->asmGenerador->instrucciones[] = new Instruction("fdiv", "s2", "s0", "s1");
            }

            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s2");
        } else {
            if ($op === '*') {
                $this->asmGenerador->mul("x9", "x11", "x10");
            } else if ($op === '/') {
                $this->asmGenerador->div("x9", "x11", "x10");
            } else if ($op === '%') {
                $this->asmGenerador->div("x12", "x11", "x10"); 
                $this->asmGenerador->instrucciones[] = new Instruction("msub", "x9", "x12", "x10, x11"); 

            }
        }

        $this->stack->pushVal("x9");
        return Result::stack($tipoFinal, $this->stack->getStackOff());
    }

    public function visitUnaryMinus(UnaryMinusContext $ctx) {
        $operand = $this->visit($ctx->factor());
        
        if (!in_array($operand->tipo, [Result::INT, Result::FLOAT, Result::CHAR])) {
            $this->addErr("Error Semantico: Negacion (-) solo para numeros. Se recibio '" . $operand->tipo . "'", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::INT, $this->stack->getStackOff());
        }

        $this->asmGenerador->comment("Negacion Unaria (-)");
        $operandReg = $this->stack->popVal("x10");
        
        if ($operand->tipo === Result::FLOAT) {
            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w10");
            $this->asmGenerador->instrucciones[] = new Instruction("fneg", "s1", "s0");
            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s1");
        } else {
            $this->asmGenerador->sub("x9", "xzr", "x10");
        }
        
        $this->stack->pushVal("x9");
        return Result::stack($operand->tipo, $this->stack->getStackOff());
    }

    public function visitIncrement(\Context\IncrementContext $ctx) {
        $id = $ctx->ID()->getText();
        $symbol = $this->env->get($id);
        $offset = $symbol->offset;

        $this->asmGenerador->comment("--- Incremento: $id++ ---");
        
        $this->asmGenerador->ldr("x9", "x29", "-$offset");
        
        $this->asmGenerador->add("x9", "x9", 1);
        
        $this->asmGenerador->str("x9", "x29", "-$offset");

        return Result::buildVacio();
    }

    public function visitDecrement(\Context\DecrementContext $ctx) {
        $id = $ctx->ID()->getText();
        $symbol = $this->env->get($id);
        $offset = $symbol->offset;

        $this->asmGenerador->comment("--- Decremento: $id-- ---");
        
        $this->asmGenerador->ldr("x9", "x29", "-$offset");
        $this->asmGenerador->sub("x9", "x9", 1);
        $this->asmGenerador->str("x9", "x29", "-$offset");

        return Result::buildVacio();
    }
}