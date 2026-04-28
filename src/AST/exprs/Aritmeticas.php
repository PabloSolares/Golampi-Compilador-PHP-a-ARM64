<?php

namespace App\AST\exprs;

use Context\AddSubExprContext;
use Context\MultDivModExprContext;
use Context\UnaryMinusContext;
use App\Env\Result;

trait Aritmeticas
{
    public function visitAddSubExpr(AddSubExprContext $ctx) {
        $this->visit($ctx->expression_arithmetic()); 
        $this->visit($ctx->term());                  
        
        $op = $ctx->getChild(1)->getText();
        $this->asmGenerador->comment("Aritmetica (Suma/Resta): " . $op);

        $rightReg = $this->stack->popVal("x10"); 
        $leftReg = $this->stack->popVal("x11");  

        if ($op === '+') {
            $this->asmGenerador->add("x9", $leftReg, $rightReg);
        } else if ($op === '-') {
            $this->asmGenerador->sub("x9", $leftReg, $rightReg);
        }

        $this->stack->pushVal("x9");
        return Result::stack(Result::INT, $this->stack->getStackOff());
    }

    public function visitMultDivModExpr(MultDivModExprContext $ctx) {
        $this->visit($ctx->term());   
        $this->visit($ctx->factor()); 
        
        $op = $ctx->getChild(1)->getText();
        $this->asmGenerador->comment("Aritmetica (Mul/Div/Mod): " . $op);

        $rightReg = $this->stack->popVal("x10");
        $leftReg = $this->stack->popVal("x11");

        if ($op === '*') {
            $this->asmGenerador->mul("x9", $leftReg, $rightReg);
        } else if ($op === '/') {
            $this->asmGenerador->div("x9", $leftReg, $rightReg);
        } else if ($op === '%') {
            $this->asmGenerador->div("x12", $leftReg, $rightReg); 
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("msub", "x9", "x12", $rightReg, $leftReg); 
        }

        $this->stack->pushVal("x9");
        return Result::stack(Result::INT, $this->stack->getStackOff());
    }

    public function visitUnaryMinus(UnaryMinusContext $ctx) {
        $this->visit($ctx->factor());
        
        $this->asmGenerador->comment("Negacion Unaria (-)");
        $operandReg = $this->stack->popVal("x10");
        
        $this->asmGenerador->sub("x9", "xzr", $operandReg);
        
        $this->stack->pushVal("x9");
        return Result::stack(Result::INT, $this->stack->getStackOff());
    }

    public function visitIncrement(\Context\IncrementContext $ctx) {
        $id = $ctx->ID()->getText();
        $symbol = $this->env->get($id);
        $offset = $symbol->offset;

        $this->asmGenerador->comment("--- Incremento: $id++ ---");
        
        $this->asmGenerador->ldr("x9", "x29", "-$offset");
        
        $this->asmGenerador->add("x9", "x9", 1);
        
        $this->asmGenerador->str("x9", "x29", "-$offset");

        return \App\Env\Result::buildVacio();
    }

    public function visitDecrement(\Context\DecrementContext $ctx) {
        $id = $ctx->ID()->getText();
        $symbol = $this->env->get($id);
        $offset = $symbol->offset;

        $this->asmGenerador->comment("--- Decremento: $id-- ---");
        
        $this->asmGenerador->ldr("x9", "x29", "-$offset");
        $this->asmGenerador->sub("x9", "x9", 1);
        $this->asmGenerador->str("x9", "x29", "-$offset");

        return \App\Env\Result::buildVacio();
    }
}