<?php

namespace App\Ast\Sentencias;

use App\Env\Result;
use Context\Return_stmtContext;
use App\ARM\Instruction;

trait Transferencia {
    public $returnLabels = [];
    public $currentFunction = "";

    public function visitReturn_stmt(Return_stmtContext $ctx){
        $result = Result::buildVacio();
        $result->isReturn = true;

        if($ctx->exprList() !== null){
            $exprs = $ctx->exprList()->expression();
            $tiposEvaluados = [];

            foreach($exprs as $exp) {
                $tiposEvaluados[] = $this->visit($exp)->tipo;
            }

            $this->asmGenerador->comment("Return: Preparando registros de salida multiples");

            $intCount = 0;
            $floatCount = 0;
            $regAssignments = [];

            foreach ($tiposEvaluados as $tipo) {
                if ($tipo === Result::FLOAT) {
                    $regAssignments[] = "s" . ($floatCount++); 
                } else {
                    $regAssignments[] = "x" . ($intCount++); 
                }
            }

            for($i = count($tiposEvaluados) - 1; $i >= 0; $i--) {
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

        if(isset($this->returnLabels[$this->currentFunction])){
            $this->asmGenerador->b($this->returnLabels[$this->currentFunction]);
        }

        return $result;
    }

    public function setCurrentFunction($name) {
        $this->currentFunction = $name;
    }
}