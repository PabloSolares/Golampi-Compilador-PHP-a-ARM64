<?php

namespace App\AST\Sentencias;

use App\Env\Result;
use Context\ForDcl1Context;
use Context\ForDcl2Context;
use Context\ForDcl3Context;

trait Ciclos {
    public function visitForDcl1(ForDcl1Context $ctx){

        $this->asmGenerador->comment("--- INICIO FOR ---"); 
        
        $prevEnv = $this->env;
        $this->env = clone $prevEnv;

        $startLabel = $this->asmGenerador->generateLabel("for_start");
        $continueLabel = $this->asmGenerador->generateLabel("for_update");
        $endLabel = $this->asmGenerador->generateLabel("for_end");

        $this->visit($ctx->for_init());

        $this->asmGenerador->label($startLabel);
        
        $this->visit($ctx->expression());
        $conditionReg = $this->stack->popVal("x9");

        $this->asmGenerador->cmp($conditionReg, "xzr");
        $this->asmGenerador->beq($endLabel);

        array_push($this->loopStack, ['continue' => $continueLabel, 'end' => $endLabel]); // break y continue

        $envBeforeBlock = $this->env;
        $this->env = clone $envBeforeBlock;

        $this->visit($ctx->block());

        $this->env = $envBeforeBlock;

        array_pop($this->loopStack);

        $this->asmGenerador->label($continueLabel);

        $this->visit($ctx->forupdate());

        $this->asmGenerador->b($startLabel);

        $this->asmGenerador->label($endLabel);

        $this->env = $prevEnv;

        $this->asmGenerador->comment("--- FIN FOR ---");
        return Result::buildVacio();
    }   

    public function visitForDcl2(ForDcl2Context $ctx){
        $this->asmGenerador->comment("--- INICIO FOR ---"); 
        
        $prevEnv = $this->env;
        $this->env = clone $prevEnv;

        $startLabel = $this->asmGenerador->generateLabel("for_start");
        $endLabel = $this->asmGenerador->generateLabel("for_end");

        $this->asmGenerador->label($startLabel);
        
        $this->visit($ctx->expression());
        $conditionReg = $this->stack->popVal("x9");

        $this->asmGenerador->cmp($conditionReg, "xzr");
        $this->asmGenerador->beq($endLabel);

        array_push($this->loopStack, ['continue' => $startLabel, 'end' => $endLabel]); // break y continue


        $envBeforeBlock = $this->env;
        $this->env = clone $envBeforeBlock;

        $this->visit($ctx->block());

        $this->env = $envBeforeBlock;

        array_pop($this->loopStack);

        $this->asmGenerador->b($startLabel);

        $this->asmGenerador->label($endLabel);

        $this->env = $prevEnv;

        $this->asmGenerador->comment("--- FIN FOR ---");
        return Result::buildVacio();
    }

    public function visitForDcl3(ForDcl3Context $ctx){
        $this->asmGenerador->comment("--- INICIO FOR ---"); 
        
        $prevEnv = $this->env;
        $this->env = clone $prevEnv;

        $startLabel = $this->asmGenerador->generateLabel("for_start");
        $endLabel = $this->asmGenerador->generateLabel("for_end");

        $this->asmGenerador->label($startLabel);

        array_push($this->loopStack, ['continue' => $startLabel, 'end' => $endLabel]); // break y continue
        
        $envBeforeBlock = $this->env;
        $this->env = clone $envBeforeBlock;

        $this->visit($ctx->block());
        
        $this->env = $envBeforeBlock;
        
        array_pop($this->loopStack);

        $this->asmGenerador->b($startLabel);

        $this->asmGenerador->label($endLabel);

        $this->env = $prevEnv;

        $this->asmGenerador->comment("--- FIN FOR ---");
        return Result::buildVacio();
    }
}