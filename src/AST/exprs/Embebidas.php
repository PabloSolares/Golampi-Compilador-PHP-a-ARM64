<?php
namespace App\AST\exprs;

use App\ARM\Instruction;
use App\Env\Result;
use Context\LenStmContext;
use Context\NowExprContext;
use Context\SubstrExprContext;
use Context\TypeOfExprContext;

trait Embebidas {
    public function visitLenStm(LenStmContext $ctx) {
        $expresionCtx = $ctx->expression();
        $textoId = $expresionCtx->getText();
        
        if ($this->env->has($textoId)) {
            $symbol = $this->env->get($textoId);
            
            if (!empty($symbol->dimensiones)) {
                $this->asmGenerador->comment("Funcion embebida: len() de Arreglo/Matriz");
                $tamano = $symbol->dimensiones[0];
                $this->asmGenerador->mov("x9", $tamano);
                $this->stack->pushVal("x9");
                return Result::stack(Result::INT, $this->stack->getStackOff());
            } elseif ($symbol->slots > 1) {
                $this->asmGenerador->comment("Funcion embebida: len() de Arreglo estatico 1D");
                $tamano = $symbol->slots;
                $this->asmGenerador->mov("x9", $tamano);
                $this->stack->pushVal("x9");
                return Result::stack(Result::INT, $this->stack->getStackOff());
            }
        }

        // si es un string
        $result = $this->visit($expresionCtx);
        if ($result->tipo === Result::STRING) {
            $this->asmGenerador->comment("Funcion embebida: len() de String (Nativa ASM)");
            $strReg = $this->stack->popVal("x10"); 
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x0", $strReg);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("bl", "string_length");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x9", "x0"); 
            $this->stack->pushVal("x9");
            return Result::stack(Result::INT, $this->stack->getStackOff());
        }

        $this->addErr("Error Semantico: len() solo acepta arreglos o strings", $ctx);
        $this->stack->pushIn(0);
        return Result::stack(Result::INT, $this->stack->getStackOff());
    }

    public function visitNowExpr(NowExprContext $ctx) {
        $this->asmGenerador->comment("Funcion embebida: now()");
        
        $fechaActual = date("Y-m-d H:i:s");
        
        $label = $this->asmGenerador->addString($fechaActual);
        $this->asmGenerador->ldrl("x9", $label);
        
        $this->stack->pushVal("x9");
        return Result::stack(Result::STRING, $this->stack->getStackOff());
    }
    
    public function visitTypeOfExpr(TypeOfExprContext $ctx) {
        $this->asmGenerador->comment("Funcion embebida: typeOf()");
        
        $expr = $this->visit($ctx->expression());
        
        // sacamos el valor
        $this->stack->popVal("x10"); 
        
        // cargamos el tipo
        $label = $this->asmGenerador->addString($expr->tipo);
        $this->asmGenerador->ldrl("x9", $label);
        
        // Empujamos a la pila
        $this->stack->pushVal("x9");
        return Result::stack(Result::STRING, $this->stack->getStackOff());
    }

    // substr(str, start, length) 
    public function visitSubstrExpr(\Context\SubstrExprContext $ctx) {
        $exprs = $ctx->exprList()->expression();
        
        if (count($exprs) !== 3) {
            $this->addErr("Error Semantico: substr() espera 3 parametros", $ctx);
            $this->stack->pushIn(0);
            return Result::stack(Result::STRING, $this->stack->getStackOff());
        }

        $strRes = $this->visit($exprs[0]);
        $startRes = $this->visit($exprs[1]);
        $lenRes = $this->visit($exprs[2]);

        if ($strRes->tipo !== Result::STRING || $startRes->tipo !== Result::INT || $lenRes->tipo !== Result::INT) {
            $this->addErr("Error Semantico: Parametros invalidos para substr(string, int, int)", $ctx);
        }

        $this->asmGenerador->comment("Funcion embebida: substr()");
        
        $lenReg = $this->stack->popVal("x2");   
        $startReg = $this->stack->popVal("x1"); 
        $strReg = $this->stack->popVal("x0");   

        
        $this->asmGenerador->cmp("x1", "xzr");
        $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("csel", "x1", "xzr", "x1, lt"); 
        
        $this->asmGenerador->cmp("x2", "xzr");
        $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("csel", "x2", "xzr", "x2, lt"); 

        $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("bl", "substring");
        $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x9", "x0");

        $this->stack->pushVal("x9");
        return Result::stack(Result::STRING, $this->stack->getStackOff());
    }
}
