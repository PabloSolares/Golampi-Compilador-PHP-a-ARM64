<?php

namespace App\Ast\exprs;

use Context\LiteralExprContext;
use Context\ParExprContext;
use App\Env\Result;

trait Primitivos{
    public function visitLiteralExpr(LiteralExprContext $ctx){
        $literal = $ctx->literal();

        if($literal->INT() !== null){
            $number = intval($literal->INT()->getText());
            $this->asmGenerador->comment("Cargando  INT: " . $number);
            $this->stack->pushIn($number);
            return Result::stack(Result::INT, $this->stack->getStackOff());
        }


        if($literal->TRUE() !== null){
            $this->asmGenerador->comment("Cargando TRUE");
            $this->stack->pushIn(1);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }

        if($literal->FALSE() !== null){
            $this->asmGenerador->comment("Cargando FALSE");
            $this->stack->pushIn(0);
            return Result::stack(Result::BOOL, $this->stack->getStackOff());
        }

        return Result::buildVacio();
    }

    public function visitParExpr(ParExprContext $ctx){
        return $this->visit($ctx->expression());
    }
}