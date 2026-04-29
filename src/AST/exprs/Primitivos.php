<?php

namespace App\Ast\exprs;

use App\ARM\Instruction;
use Context\LiteralExprContext;
use Context\ParExprContext;
use App\Env\Result;

trait Primitivos{
    public function visitLiteralExpr(LiteralExprContext $ctx){
        $literal = $ctx->literal();

        if ($literal->arrayLiteral() !== null) {
            return $this->visit($literal->arrayLiteral());
        }

        if($literal->INT() !== null){
            $number = intval($literal->INT()->getText());
            $this->asmGenerador->comment("Cargando  INT: " . $number);
            $this->stack->pushIn($number);
            return Result::stack(Result::INT, $this->stack->getStackOff());
        }


        if($literal->STRING() !== null){
            $texto = $literal->STRING()->getText();
            $this->asmGenerador->comment("Cargando STRING: " . $texto);

            $label = $this->asmGenerador->addString($texto);

            $this->asmGenerador->ldrl("x9" , $label);
            $this->stack->pushval("x9");
            return Result::stack(Result::STRING, $this->stack->getStackOff());
        }

        if($literal->FLOAT() !== null){
            $valor = $literal->FLOAT()->getText();
            $this->asmGenerador->comment("Cargando FLOAT: " . $valor);

            $ieee754 = unpack('L', pack('f', $valor))[1];

            $this->asmGenerador->instrucciones[] = new Instruction("ldr", "w9", "=".$ieee754); // cargamos la mitad del registro
            $this->stack->pushVal("x9"); 
            return Result::stack(Result::FLOAT, $this->stack->getStackOff());
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

        if($literal->CHAR() !== NULL){
            $charText = $literal->CHAR()->getText();
            $charLimpio = trim($charText, "'");
            
            $charLimpio = stripcslashes($charLimpio);

            $ascii = ord($charLimpio);

            $this->asmGenerador->comment("Cargando CHAR: $charText (ASCII: $ascii)");

            $this->stack->pushIn($ascii);

            return Result::stack(Result::CHAR, $this->stack->getStackOff());
        }

        if ($literal->NIL() !== NULL) {
            $this->asmGenerador->mov("x9", "xzr"); 
            $this->stack->pushVal("x9");
            return Result::stack("nil", $this->stack->getStackOff()); 
        }

        return Result::buildVacio();
    }

    public function visitParExpr(ParExprContext $ctx){
        return $this->visit($ctx->expression());
    }
}