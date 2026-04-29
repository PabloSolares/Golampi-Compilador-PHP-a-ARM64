<?php

namespace App\AST\Sentencias;

use App\Env\Symbol;
use App\Env\Enviroment;
use App\Env\Result;

class FunctionGenerator
{
    private $asmGenerador;
    private $stack;
    private $compiler;

    public function __construct($asmGenerador, $stack, $env, $compiler) {
        $this->asmGenerador = $asmGenerador;
        $this->stack = $stack;
        $this->compiler = $compiler;
    }

    public function generateFunction($funcName, $symbol) {
        $funcLabel = "func_" . $funcName;
        $returnLabel = "func_end_" . $funcName;
        
        $this->compiler->returnLabels[$funcName] = $returnLabel;
        $this->compiler->setCurrentFunction($funcName);

        $this->asmGenerador->comment("------- Funcion : $funcName -------");
        $this->asmGenerador->label($funcLabel);
        
        $totalSlots = $symbol->totalSlots;
        $paramCount = $symbol->paramCount;
        
        // conversion a bytes 
        $frameSize = ($totalSlots + 2) * 16;
        $frameSize = ceil($frameSize / 16) * 16;

        $this->asmGenerador->comment("Reservar espacio para registro de activacion");
        $this->asmGenerador->subi("sp", "sp", $frameSize);
        
        $this->asmGenerador->comment("Guardar FP y LR al fondo del frame");
        $this->asmGenerador->str("x29", "sp", 0);
        $this->asmGenerador->str("x30", "sp", 16);
        
        $this->asmGenerador->comment("Actualizar FP (Apunta al inicio del frame)");
        $this->asmGenerador->addi("x29", "sp", $frameSize);

        $prevEnv = $this->compiler->env;
        $localEnv = new Enviroment($prevEnv, Enviroment::TYPE_FUNCTION);

        $this->compiler->env = $localEnv;
        
        $intCount = 0;
        $floatCount = 0;

        foreach ($symbol->params as $param) {
            // registramos el param y dejamos que el env calcule el offset local
            $paramSymbol = new Symbol($param->tipo, Symbol::CLASE_VARIABLE);
            $localEnv->set($param->id, $paramSymbol);
            $localOffset = $localEnv->allocateVarOffset($param->id);
            
            $this->asmGenerador->comment("Recibiendo parametro: " . $param->id);
            
            if ($param->tipo === Result::FLOAT) {
                $regIn = "s" . $floatCount++;
                $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("fmov", "w9", $regIn);
                $this->asmGenerador->str("x9", "x29", "-$localOffset");
            } else {
                $regIn = "x" . $intCount++;
                $this->asmGenerador->str($regIn, "x29", "-$localOffset");
            }
        }
        
        $this->compiler->visit($symbol->valor);

        $this->compiler->env = $prevEnv;
        
        $this->asmGenerador->label($returnLabel);
        
        $this->asmGenerador->comment("Restaurar LR y FP");
        $this->asmGenerador->ldr("x30", "sp", 16);
        $this->asmGenerador->ldr("x29", "sp", 0);
        
        $this->asmGenerador->comment("Restaurar SP");
        $this->asmGenerador->addi("sp", "sp", $frameSize);
        
        $this->asmGenerador->comment("Retornar");
        $this->asmGenerador->ret();
        $this->asmGenerador->comment("------- Fin de funcion: $funcName -------");
    }
}