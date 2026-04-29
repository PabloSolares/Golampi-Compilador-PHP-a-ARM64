<?php

namespace App\AST\Sentencias;

use Context\FuncStmtContext;
use App\Env\Symbol;
use App\Env\Result;
use App\Env\Enviroment;
use GrammarBaseVisitor; 

trait FunctionDeclaracion
{
    public function visitFuncStmt(FuncStmtContext $ctx)
    {
        $funcName = $ctx->ID()->getText();
        
        $returnType = "void";
        $resCtx = $ctx->funcParRet()->result();
        if ($resCtx !== null) {
            if (count($resCtx->type()) > 1) {
                $returnType = [];
                foreach ($resCtx->type() as $t) {
                    $returnType[] = $t->getText();
                }
            } else {
                $returnType = $resCtx->type(0)->getText();
            }
        }

        $params = [];
        $paramIndex = 0;
        $paramCtx = $ctx->funcParRet()->parameters();
        
        if ($paramCtx !== null) {
            foreach ($paramCtx->paramDcl() as $paramDcl) {
                $tipo = $paramDcl->type()->getText();
                foreach ($paramDcl->idList()->ID() as $idNode) {
                    $params[] = new Parametro($idNode->getText(), $tipo, $paramIndex++);
                }
            }
        }

        $block = $ctx->block();
        $paramCount = count($params);
        
        $counter = new LocalVarCounter();
        $counter->visit($block);
        $localVarCount = $counter->count;
        
        $totalSlots = 2 + $paramCount + ($localVarCount * 2) + 10; 
        
        $funcSymbol = new Symbol($returnType, Symbol::CLASE_FUNCION, 0, 0);
        $funcSymbol->valor = $block; 
        $funcSymbol->params = $params;
        $funcSymbol->paramCount = $paramCount;
        $funcSymbol->localVarCount = $localVarCount;
        $funcSymbol->totalSlots = $totalSlots;
        
        $this->env->set($funcName, $funcSymbol);
        
        $funcEnv = new Enviroment($this->env, Enviroment::TYPE_FUNCTION);
        foreach ($params as $param) {
            $funcEnv->set($param->id, new Symbol($param->tipo, Symbol::CLASE_VARIABLE, 0, 0));
        }

        return Result::buildVacio();
    }
}

class Parametro {
    public $id;
    public $tipo;
    public $position;

    public function __construct($id, $tipo, $position) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->position = $position;
    }
}

class LocalVarCounter extends GrammarBaseVisitor {
    public $count = 0;

    public function visitVarDecl(\Context\VarDeclContext $ctx) {
        $this->count += count($ctx->idList()->ID());
        return $this->visitChildren($ctx);
    }

    public function visitShortDecl(\Context\ShortDeclContext $ctx) {
        $this->count += count($ctx->idList()->ID());
        return $this->visitChildren($ctx);
    }
}