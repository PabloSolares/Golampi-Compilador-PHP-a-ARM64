<?php

namespace App\Ast\Sentencias;

use App\Env\Result;
use Context\Return_stmtContext;

trait Transferencia {
    public $returnLabels = [];

    public function visitReturn_stmt(Return_stmtContext $ctx){
        $result = Result::buildVacio();
        $result->isReturn = true;

        if($ctx->exprList() !== null){

            $this->visit($ctx->exprList());

            $exprCount = count($ctx->exprList()->expression());

            $this->asmGenerador->comment("Return: guardado $exprCount valor(es) de retorno");

            for($i = $exprCount -1 ; $i >= 0; $i--){
                $returnReg = $this->stack->popVal();
                $targetReg = "x" . $i;

                $this->asmGenerador->mov($targetReg,  $returnReg);
            }


        }

        if(isset($this->returnLabels[$this->currentFunction])){
            $returnLabels = $this->returnLabels[$this->currentFunction];
            $this->asmGenerador->b($returnLabels);
        }

        return $result;
        
    }

    public function setCurrentFunction($name) {
        $this->currentFunction = $name;
    }
}