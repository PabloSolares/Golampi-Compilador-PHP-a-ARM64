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
        
        
        $this->stack->popVal();
        
        return Result::buildVacio();
    }

    private function handleFunctionCall($funcName, $argsCtx)
    {
        $symbol = $this->env->get($funcName);
        
        if ($symbol->clase !== Symbol::CLASE_FUNCION) {
            $this->addErr("Error Semantico: '$funcName' no es una funcion.", $argsCtx);
            return Result::buildVacio();
        }
        
        $args = [];
        if ($argsCtx !== null) {
            $args = $this->visit($argsCtx);
            if (!is_array($args)) $args = [$args];
        }
        
        if (count($symbol->params) !== count($args)) {
            $this->addErr("Error Semantico: Numero incorrecto de argumentos para '$funcName'.", $argsCtx);
            return Result::buildVacio();
        }
        
        $this->asmGenerador->comment("--- Llamada a funcion: $funcName ---");
        
        $paramCount = count($args);
        $this->asmGenerador->subi("sp", "sp", ($paramCount + 1) * 16);
        
        $argIndex = 0;
        foreach ($args as $arg) {
            $offset = ($paramCount - $argIndex) * 16;
            $argReg = $this->stack->popValue(); 
            $this->asmGenerador->str($argReg, "sp", $offset);
            $argIndex++;
        }
        
        $funcLabel = "func_" . $funcName;
        $this->asmGenerador->bl($funcLabel);
        
        $this->asmGenerador->mov("x9", "x0");
        $this->asmGenerador->addi("sp", "sp", ($paramCount + 1) * 16);
        
        $this->stack->pushValue("x9");
        
        return Result::stack(Result::INT, $this->stack->getStackOffset());
    }
}