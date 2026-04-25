<?php

namespace App\AST\Sentencias;

use App\Env\Result;
use Context\IfDclContext;

trait IfStatement{
    public function visitIfDcl(IfDclContext $ctx){
        $this->visit($ctx->expression());

        $conditionReg = $this->stack->popVal("x9");

        $endLabel = $this->asmGenerador->generateLabel("if_end");

        $hasElse = $ctx->block(1) !== null;
        $elseLabel = $hasElse ? $this->asmGenerador->generateLabel("if_else") : $endLabel;


        $this->asmGenerador->comment("If: evaluar condicion");

        $this->asmGenerador->cmp($conditionReg, "xzr");

        $this->asmGenerador->beq($elseLabel);

    

        $this->asmGenerador->comment("If: ejecutar bloque true");

        $prevEnv = $this->env;
        $this->env = clone $prevEnv;
        
        $this->visit($ctx->block(0));

        $this->env = $prevEnv;

        if($hasElse){

            $this->asmGenerador->b($endLabel);
            
            $this->asmGenerador->label($elseLabel);
            $this->asmGenerador->comment("If: ejecutar bloque else");

            $prevEnv = $this->env;
            $this->env = clone $prevEnv;
            
            $this->visit($ctx->block(1));

            $this->env = $prevEnv;

        }

        $this->asmGenerador->label($endLabel);

        return Result::buildVacio();
    }
}