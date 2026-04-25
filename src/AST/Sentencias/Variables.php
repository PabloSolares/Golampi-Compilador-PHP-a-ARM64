<?php

namespace App\Ast\Sentencias;

use Context\VarDeclContext;
use Context\ShortDeclContext;
use Context\AssingmentContext;
use Context\IdExprContext;
use App\Env\Symbol;
use App\Env\Result;

trait Variables
{
    public function visitVarDecl(VarDeclContext $ctx) {
        $ids = $ctx->idList()->ID();
        $tipo = $ctx->type()->getText();

        $offsets = [];
        foreach ($ids as $idNode) {
            $id = $idNode->getText();
            $symbol = new Symbol($tipo, Symbol::CLASE_VARIABLE);
            $this->env->set($id, $symbol);
            $offsets[] = $this->env->allocateVarOffset($id);
        }

        $this->asmGenerador->comment("Declaracion de variables: " . $ctx->idList()->getText());

        if ($ctx->exprList() !== null) {
            $this->visit($ctx->exprList());
            
            for ($i = count($ids) - 1; $i >= 0; $i--) {
                $reg = $this->stack->popVal();
                $this->asmGenerador->str($reg, "x29", "-".$offsets[$i]);
            }
        } else {
            $this->asmGenerador->li("x9", 0);
            foreach ($offsets as $offset) {
                $this->asmGenerador->str("x9", "x29", "-".$offset);
            }
        }

        return Result::buildVacio();
    }

    public function visitShortDecl(ShortDeclContext $ctx) {
        $ids = $ctx->idList()->ID();
        $offsets = [];

        foreach ($ids as $idNode) {
            $id = $idNode->getText();
            $symbol = new Symbol("inferido", Symbol::CLASE_VARIABLE);
            $this->env->set($id, $symbol);
            $offsets[] = $this->env->allocateVarOffset($id);
        }

        $this->asmGenerador->comment("Declaracion corta: " . $ctx->idList()->getText());
        
        $this->visit($ctx->exprList());

        for ($i = count($ids) - 1; $i >= 0; $i--) {
            $reg = $this->stack->popVal();
            $this->asmGenerador->str($reg, "x29", "-".$offsets[$i]);
        }

        return Result::buildVacio();
    }

    public function visitAssingment(AssingmentContext $ctx) {
        $vars = $ctx->assingExp();

        // evalua la parte derecha y manda el valor a la pila
        $this->visit($ctx->exprList());

        $ope = $ctx->typeAssing()->getText();

        if($vars->idList() !== null){
            $idName = $vars->idList()->ID(0)->getText();
            if(!$this->env->has($idName)){
                $this->addErr("Variable '$idName' no declarada para asignacion");
                return Result::buildVacio();
            }

            $this->asmGenerador->comment("Reasignacion de variable: " . $idName);

            $valReg = $this->stack->popVal("x9");

            $symbol = $this->env->get($idName);
            $offset = $symbol->offset;

            if($ope === "="){
                $this->asmGenerador->str($valReg, "x29", "-$offset");
            }
        }
        return Result::buildVacio();
    }

    public function visitIdExpr(IdExprContext $ctx) {
        $id = $ctx->ID()->getText();
        $this->asmGenerador->comment("Lectura de variable: " . $id);

        try {
            $offset = $this->env->getVarOffset($id);
            $this->asmGenerador->ldr("x9", "x29", "-".$offset);
            $this->stack->pushVal("x9");
        } catch (\Exception $e) {
            $this->addErr($e->getMessage(), $ctx);
            $this->stack->pushIn(0); 
        }

        return Result::stack(Result::INT, $this->stack->getStackOff());
    }
}