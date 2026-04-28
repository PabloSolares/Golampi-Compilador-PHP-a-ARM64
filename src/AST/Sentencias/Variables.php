<?php

namespace App\Ast\Sentencias;

use Context\VarDeclContext;
use Context\ShortDeclContext;
use Context\AssingmentContext;
use Context\IdExprContext;
use App\Env\Symbol;
use App\Env\Result;
use Context\TypeArrayDefContext;

trait Variables
{
    public function visitVarDecl(VarDeclContext $ctx)
    {
        $ids = $ctx->idList()->ID();

        $tipo = "desconocido";
        $isArray = false;
        $slots = 1;
        $tipoCtx = $ctx->type();

        if ($tipoCtx instanceof TypeArrayDefContext) {
            $isArray = true;
            $expCtx = $tipoCtx->arrayType()->expression();
            if ($expCtx !== null) {
                $slots = intval($expCtx->getText());
                if ($slots <= 0) {
                    $slots = 1;
                }
            }
            $tipo = $tipoCtx->arrayType()->type()->getText();
        } else {
            $tipo = $tipoCtx->getText();
        }

        $offsets = [];
        foreach ($ids as $idNode) {
            $id = $idNode->getText();
            $symbol = new Symbol($tipo, Symbol::CLASE_VARIABLE);
            $symbol->slots = $slots; 
            $this->env->set($id, $symbol);

            $offsets[] = $this->env->allocateVarOffset($id, $slots);
        }

        $this->asmGenerador->comment("Declaracion de variables: " . $ctx->idList()->getText());

        // si tiene valor para inicialziar
        if ($ctx->exprList() !== null) {
            $this->visit($ctx->exprList());

            if ($isArray) {
                // Inicializar arraglo
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $baseOffset = $offsets[$i];
                    for ($j = $slots - 1; $j >= 0; $j--) {
                        $this->stack->popVal("x9");
                        $currentOffset = $baseOffset + ($j * 16);
                        $this->asmGenerador->str("x9", "x29", "-" . $currentOffset);
                    }
                }
            } else {
                // Inicializar vairable normal
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $this->stack->popVal("x9");
                    $this->asmGenerador->str("x9", "x29", "-" . $offsets[$i]);
                }
            }
        } else {

            // NO tiene valor de inicializacion 
            // Llenamos la memoria con ceros
            $this->asmGenerador->mov("x9", 0);
            
            foreach ($offsets as $baseOffset) {
                for ($j = 0; $j < $slots; $j++) {
                    $currentOffset = $baseOffset + ($j * 16);
                    $this->asmGenerador->str("x9", "x29", "-" . $currentOffset);
                }
            }
        }

        return Result::buildVacio();
    }
    public function visitShortDecl(ShortDeclContext $ctx)
    {
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
            $this->stack->popVal("x9");
            $this->asmGenerador->str("x9", "x29", "-" . $offsets[$i]);
        }

        return Result::buildVacio();
    }

    public function visitAssingment(AssingmentContext $ctx)
    {
        $vars = $ctx->assingExp();

        // evalua la parte derecha y manda el valor a la pila
        $this->visit($ctx->exprList());

        $ope = $ctx->typeAssing()->getText();

        if ($vars->idList() !== null) {
            $idName = $vars->idList()->ID(0)->getText();
            if (!$this->env->has($idName)) {
                $this->addErr("Variable '$idName' no declarada para asignacion");
                return Result::buildVacio();
            }

            $this->asmGenerador->comment("Reasignacion de variable: " . $idName);

            $valReg = $this->stack->popVal("x9");

            $symbol = $this->env->get($idName);
            $offset = $symbol->offset;

            if ($ope === "=") {
                $this->asmGenerador->str($valReg, "x29", "-$offset");
            }
        } elseif ($vars->arrayAccess() !== null){
            $arrayAccessCtx = $vars->arrayAccess();
            $idName = $arrayAccessCtx->ID()->getText();
            $symbol = $this->env->get($idName);

            $this->asmGenerador->comment("--- ASIGNACION A ARREGLO: $idName ---");

            $valueReg = $this->stack->popVal("x10");

            $this->visit($arrayAccessCtx->expression(0));
            $indexReg = $this->stack->popVal("x11");
            
            $this->asmGenerador->mov("x12", $symbol->offset);
            $this->asmGenerador->mov("x13", 16);
            $this->asmGenerador->mul("x14", $indexReg, "x13");
            $this->asmGenerador->add("x15", "x12", "x14");

            $this->asmGenerador->sub("x16", "x29", "x15");

            if ($ope === "=") {
                $this->asmGenerador->str($valueReg, "x16", 0);
            }
        }

        return Result::buildVacio();
    }

    public function visitIdExpr(IdExprContext $ctx)
    {
        $id = $ctx->ID()->getText();
        $this->asmGenerador->comment("Lectura de variable: " . $id);

        try {
            $offset = $this->env->getVarOffset($id);
            $this->asmGenerador->ldr("x9", "x29", "-" . $offset);
            $this->stack->pushVal("x9");
        } catch (\Exception $e) {
            $this->addErr($e->getMessage(), $ctx);
            $this->stack->pushIn(0);
        }

        return Result::stack(Result::INT, $this->stack->getStackOff());
    }
}
