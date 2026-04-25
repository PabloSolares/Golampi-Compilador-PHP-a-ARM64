<?php

namespace App\AST\Sentencias;

use App\Env\Result;
use Context\IfDclContext;

trait IfStatement{
    public function visitIfDcl(IfDclContext $ctx){
        $conditionRes = $this->visit($ctx->expression());

        $conditionReg = $this->stack->popVal();

        $endLabel = $this->asmGenerador->generateLabel("if_end");

        $elseLabel = $ctx->else() !== null ? $this->asmGenerador->generateLabel("if_else") : $endLabel;


        $this->asmGenerador->comment("If: evaluar condicion");
        $this->asmGenerador->cmp($conditionReg, "xzr");

        if ($ctx->else() !== null) {
            $this->asmGenerador->beq($elseLabel);
        } else {
            $this->asmGenerador->beq($endLabel);
        }

        $this->asmGenerador->comment("If: ejecutar bloque true");
        $this->visit($ctx->block());
        
        if ($ctx->else() !== null) {
            $this->asmGenerador->b($endLabel);
            $this->asmGenerador->label($elseLabel);
            $this->asmGenerador->comment("If: ejecutar bloque else");
            $this->visit($ctx->else());
        }
        
        $this->asmGenerador->label($endLabel);
        return Result::buildVacio();
    }
}