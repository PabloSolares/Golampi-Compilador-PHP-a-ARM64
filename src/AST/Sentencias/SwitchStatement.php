<?php

namespace App\AST\Sentencias;

use App\Env\Result;
use Context\SwitchDclContext;

trait SwitchStatement {

    public function visitSwitchDcl(SwitchDclContext $ctx){
        $this->asmGenerador->comment("--- INICIO SWITCH --- ");
        $endLabel = $this->asmGenerador->generateLabel("switch_end");
        $caseLabels = [];

        $this->visit($ctx->expression());

        $cases = $ctx->switchCase() ?? [];

        foreach($cases as $i => $caseCtx){
            $caseLabel = $this->asmGenerador->generateLabel("case_" . $i);
            $caseLabels[] = $caseLabel;
            foreach($caseCtx->exprList()->expression() as $expCase){

                $this->visit($expCase);

                $caseValReg = $this->stack->popVal("x10");
                $switchValReg = $this->stack->popVal("x11");

                $this->asmGenerador->cmp($switchValReg, $caseValReg);

                $this->asmGenerador->beq($caseLabel);

                // Si NO ES IGUAL  volvemos a guardar
                // el valor del switch en la pila para probarlo contra el siguiente case.
                $this->stack->pushVal("x11");
            }
                
        }

        $this->asmGenerador->comment("Limpiar valor principal del switch de la pila");
        $this->stack->popVal("xzr");
        
        $defaultLabel = null;
        if ($ctx->caseDefault() !== null) {
            $defaultLabel = $this->asmGenerador->generateLabel("switch_default");
            $this->asmGenerador->b($defaultLabel);
        } else {
            $this->asmGenerador->b($endLabel);
        }

        array_push($this->loopStack, ['end' => $endLabel]);

        foreach($cases as $i => $caseCtx) {
            $this->asmGenerador->label($caseLabels[$i]);
            $this->asmGenerador->comment("Case " . $i);

            $prevEnv = $this->env;
            $this->env = clone $prevEnv;

            foreach($caseCtx->statement() as $stmt) {
                $this->visit($stmt);
            }

            $this->env = $prevEnv;
            $this->asmGenerador->b($endLabel);
        }

        if ($ctx->caseDefault() !== null) {
            $this->asmGenerador->label($defaultLabel);
            $this->asmGenerador->comment("Default");

            $prevEnv = $this->env;
            $this->env = clone $prevEnv;

            foreach($caseCtx->statement() as $stmt) {
                $this->visit($stmt);
            }

            $this->env = $prevEnv;
        }

        // Sacamos la etiqueta de break
        array_pop($this->loopStack);

        // label del fin del switch
        $this->asmGenerador->label($endLabel);

        $this->asmGenerador->comment("--- FIN SWITCH ---");
        return Result::buildVacio();
    }
}
