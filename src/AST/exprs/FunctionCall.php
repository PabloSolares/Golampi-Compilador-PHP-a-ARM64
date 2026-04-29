<?php
namespace App\Ast\exprs;

use Context\FuncCallExprContext;
use Context\CallStmContext;
use App\Env\Symbol;
use App\Env\Result;

trait FunctionCall
{
    public function visitFuncCallExpr(FuncCallExprContext $ctx) {
        return $this->handleFunctionCall($ctx->ID()->getText(), $ctx->exprList());
    }

    public function visitCallStm(CallStmContext $ctx) {
        $this->visit($ctx->funcAccess());
        if ($this->stack->getStackOff() > 0) {
             $this->stack->popVal("xzr");
        }
        return Result::buildVacio();
    }

    private function handleFunctionCall($funcName, $argsCtx) {
        $symbol = $this->env->get($funcName);
        $argCount = 0;
        $evaluadosTipos = [];
        
        // evaluar patrametros
        if ($argsCtx !== null) {
            $expresiones = $argsCtx->expression();
            $argCount = count($expresiones);
            foreach ($expresiones as $expr) {
                $evaluadosTipos[] = $this->visit($expr)->tipo;
            }
        }
        
        $this->asmGenerador->comment("--- Llamada a funcion: $funcName (AAPCS64) ---");
        
        if ($argCount > 0) {
            $intCount = 0;
            $floatCount = 0;
            $regAssignments = []; 
            foreach ($evaluadosTipos as $tipo) {
                if ($tipo === Result::FLOAT) {
                    $regAssignments[] = "s" . $floatCount++;
                } else {
                    $regAssignments[] = "x" . $intCount++;
                }
            }
            for ($i = $argCount - 1; $i >= 0; $i--) {
                $targetReg = $regAssignments[$i];
                $valReg = $this->stack->popVal("x9"); 
                if (str_starts_with($targetReg, "s")) {
                    $wReg = "w" . str_replace("x", "", $valReg);
                    $this->asmGenerador->instrucciones[] = new Instruction("fmov", $targetReg, $wReg);
                } else { 
                    $this->asmGenerador->mov($targetReg, $valReg);
                }
            }
        }
        
        $this->asmGenerador->bl("func_" . $funcName);

        // agarrar retornos
        if ($symbol->tipo !== "void" && $symbol->tipo !== Result::NULO) {
            $intCount = 0;
            $floatCount = 0;

            if (is_array($symbol->tipo)) {
                $this->asmGenerador->comment("Atrapando retornos multiples");
                foreach ($symbol->tipo as $t) {
                    if ($t === Result::FLOAT) {
                        $srcReg = "s" . $floatCount++;
                        $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", $srcReg);
                    } else {
                        $srcReg = "x" . $intCount++;
                        $this->asmGenerador->mov("x9", $srcReg);
                    }
                    $this->stack->pushVal("x9");
                }
                return Result::stack($symbol->tipo, $this->stack->getStackOff());
            } else {
                if ($symbol->tipo === Result::FLOAT) {
                    $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s0");
                } else {
                    $this->asmGenerador->mov("x9", "x0");
                }
                $this->stack->pushVal("x9");
                return Result::stack($symbol->tipo, $this->stack->getStackOff());
            }
        }
        return Result::buildVacio();
    }
}