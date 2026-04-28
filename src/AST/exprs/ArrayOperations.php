<?php
namespace App\AST\exprs;

use App\Env\Result;
use Context\ArrayAccessExprContext;
use Context\AsingArrayContext;

trait ArrayOperations {
    public function visitArrayAccessExpr(ArrayAccessExprContext $ctx){
        $arrayAccessCtx = $ctx->arrayAccess();

        $id = $arrayAccessCtx->ID()->getText();
        $symbol = $this->env->get($id);

        $this->asmGenerador->comment("--- LECTURA DE ARREGLO: $id ---");

        $this->visit($arrayAccessCtx->expression(0));
        $indexReg = $this->stack->popVal("x11");

        $this->asmGenerador->mov("x12", $symbol->offset); // x12 = Offset Base
        $this->asmGenerador->mov("x13", 16);              // x13 = 16 bytes por bloque
        $this->asmGenerador->mul("x14", $indexReg, "x13"); // x14 = (Index * 16)
        $this->asmGenerador->add("x15", "x12", "x14");  // x15 = Offset Total

        $this->asmGenerador->sub("x16", "x29", "x15");

        $this->asmGenerador->ldr("x9", "x16", 0);
        
        $this->stack->pushVal("x9");

        return Result::stack($symbol->tipo, $this->stack->getStackOff());
    }

    public function visitAsingArray(AsingArrayContext $ctx) {
        $id = $ctx->ID()->getText();
        $symbol = $this->env->get($id);

        $this->asmGenerador->comment("--- ASIGNACION A ARREGLO: $id ---");

        // evaluar el valor a guardar
        $this->visit($ctx->expression());
        $valueReg = $this->stack->popVal("x10");

        // evaluar el indice
        $this->visit($ctx->arrayDimension()->expression(0));
        $indexReg = $this->stack->popVal("x11");
        
        //calcular offset
        $this->asmGenerador->mov("x12", $symbol->offset);
        $this->asmGenerador->mov("x13", 16);
        $this->asmGenerador->mul("x14", $indexReg, "x13");
        $this->asmGenerador->add("x15", "x12", "x14");

        $this->asmGenerador->sub("x16", "x29", "x15");

        // Guardar el valor en esa direccion
        $this->asmGenerador->str($valueReg, "x16", 0);

        return Result::buildVacio();
    }

    

}