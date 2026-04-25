<?php

namespace App\Ast\exprs;

use Context\FuncCallExprContext;
use Context\CallStmContext;
use App\Env\Symbol;
use App\Env\Result;

trait FunctionCall
{
    public function visitFuncCallExpr(FuncCallExprContext $ctx)
    {
        return $this->handleFunctionCall($ctx->ID()->getText(), $ctx->exprList());
    }

    public function visitCallStm(CallStmContext $ctx)
    {
        $this->visit($ctx->funcAccess());
        
        
        $this->stack->popVal("xzr");
        
        return Result::buildVacio();
    }

    private function handleFunctionCall($funcName, $argsCtx)
    {
        $symbol = $this->env->get($funcName);
        
        if ($symbol === null) {
            $this->addErr("Error Semantico: La funcion '$funcName' no ha sido declarada.", $argsCtx);
            return Result::buildVacio();
        }

        if ($symbol->clase !== Symbol::CLASE_FUNCION) {
            $this->addErr("Error Semantico: '$funcName' no es una funcion.", $argsCtx);
            return Result::buildVacio();
        }
        
        $argCount = 0;
        if ($argsCtx !== null) {
            $this->visit($argsCtx);
            $argCount = count($argsCtx->expression());
        }
        
        if ($symbol->paramCount !== $argCount) {
            $this->addErr("Error Semantico: Numero incorrecto de argumentos para '$funcName'.", $argsCtx);
            return Result::buildVacio();
        }
        
        $this->asmGenerador->comment("--- Llamada a funcion: $funcName ---");
        
        
        $funcLabel = "func_" . $funcName;
        $this->asmGenerador->bl($funcLabel);

        if($argCount > 0 ){
            $this->asmGenerador->comment("Limpiando $argCount argumentos de la pila");
            for($i = 0; $i < $argCount; $i++){
                $this->stack->popVal("xzr");
            }
            
        }
        if($symbol->tipo !== "void"){
            $this->asmGenerador->mov("x9", "x0");
            $this->stack->pushVal("x9");

            return Result::stack($symbol->tipo, $this->stack->getStackOff());
        }
        
        
        
        return Result::buildVacio();
    }
}