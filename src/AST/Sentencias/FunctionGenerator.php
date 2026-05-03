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
            $paramSymbol = new Symbol($param->tipo, Symbol::CLASE_VARIABLE);
            
            if (isset($param->dimensiones) && !empty($param->dimensiones)) {
                $paramSymbol->dimensiones = $param->dimensiones;
                $paramSymbol->isParamArray = true;
            }

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

        $returnDims = $symbol->dimensiones ?? [];
        if (!empty($returnDims)) {
            $elements = 1;
            foreach ($returnDims as $d) $elements *= intval($d);
            $bytes = $elements * 16;
            
            $this->asmGenerador->comment("--- Salvando arreglo retornado en el HEAP ---");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("ldr", "x1", "=string_heap_ptr");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("ldr", "x2", "[x1]");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x3", $bytes);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("add", "x4", "x2", "x3");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("str", "x4", "[x1]");
            
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("sub", "x5", "x4", "16");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x10", "x0");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x11", "x5");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x12", "0");
            
            $loopLabel = "copy_loop_" . $funcName;
            $endLabel = "copy_done_" . $funcName;
            
            $this->asmGenerador->label($loopLabel);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("cmp", "x12", $elements);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("b.ge", $endLabel);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("ldr", "x13", "[x10]");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("str", "x13", "[x11]");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("sub", "x10", "x10", "16");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("sub", "x11", "x11", "16");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("add", "x12", "x12", "1");
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("b", $loopLabel);
            $this->asmGenerador->label($endLabel);
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("mov", "x0", "x5");
        }
        
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