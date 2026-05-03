<?php

namespace App\AST\Sentencias;

use Context\FuncStmtContext;
use App\Env\Symbol;
use App\Env\Result;
use App\Env\Enviroment;
use GrammarBaseVisitor; 
use App\Env\ReporteSimbolos;
trait FunctionDeclaracion
{
    public function visitFuncStmt(FuncStmtContext $ctx)
    {
        $funcName = $ctx->ID()->getText();

        $linea = $ctx->getStart()->getLine();
        $col = $ctx->getStart()->getCharPositionInLine();
        ReporteSimbolos::add($funcName, 'función', 'global', '—', $linea, $col);
        
        $returnType = "void";
        $returnDims = [];
        $resCtx = $ctx->funcParRet()->result();
        if ($resCtx !== null) {
            if (count($resCtx->type()) > 1) {
                $returnType = [];
                foreach ($resCtx->type() as $t) {
                    $d = [];
                    $cleanT = $this->normalizeFunctionType($t->getText(), $d);
                    if (!empty($d) && !str_ends_with($cleanT, "_ptr")) $cleanT .= "_ptr";
                    $returnType[] = $cleanT;
                }
            } else {
                $returnType = $this->normalizeFunctionType($resCtx->type(0)->getText(), $returnDims);
                if (!empty($returnDims) && !str_ends_with($returnType, "_ptr")) $returnType .= "_ptr";
            }
        }

        $params = [];
        $paramIndex = 0;
        $paramCtx = $ctx->funcParRet()->parameters();
        
        if ($paramCtx !== null) {
            foreach ($paramCtx->paramDcl() as $paramDcl) {
                $tipoCrudo = $paramDcl->type()->getText();
                $dims = [];
                $tipoLimpio = $this->normalizeFunctionType($tipoCrudo, $dims);
                if (!empty($dims) && !str_ends_with($tipoLimpio, "_ptr")) $tipoLimpio .= "_ptr";
                
                foreach ($paramDcl->idList()->ID() as $idNode) {
                    $p = new Parametro($idNode->getText(), $tipoLimpio, $paramIndex++);
                    $p->dimensiones = $dims;
                    $params[] = $p;

                    $pLinea = $idNode->getSymbol()->getLine();
                    $pCol = $idNode->getSymbol()->getCharPositionInLine();
                    $esArr = !empty($dims);
                    ReporteSimbolos::add($idNode->getText(), $tipoLimpio, $funcName, '—', $pLinea, $pCol, $esArr);
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
        $funcSymbol->dimensiones = $returnDims; 
        
        $this->env->set($funcName, $funcSymbol);
        
        $funcEnv = new Enviroment($this->env, Enviroment::TYPE_FUNCTION);
        foreach ($params as $param) {
            $sym = new Symbol($param->tipo, Symbol::CLASE_VARIABLE, 0, 0);
            $sym->dimensiones = $param->dimensiones;
            $sym->isParamArray = !empty($param->dimensiones); 
            $funcEnv->set($param->id, $sym);
        }

        return Result::buildVacio();
    }

    private function normalizeFunctionType($type, &$dims = []) {
        if ($type === null) return Result::NULO; 
        $t = $type;
        $isPointer = false;
        
        if(str_starts_with($t, '*')) {
            $isPointer = true;
            $t = substr($t, 1);
        }

        if (preg_match_all('/\[(\d+)\]/', $t, $matches)) {
            foreach ($matches[1] as $dim) {
                $dims[] = intval($dim);
            }
            $t = preg_replace('/\[\d+\]/', '', $t);
        }

        if(preg_match('/\]([a-zA-Z0-9_]+)$/', $t, $matches)){
            $t = $matches[1];
        }
        
        if ($t === 'int32' || $t === 'int') $t = Result::INT;
        elseif ($t === 'float32' || $t === 'float') $t = Result::FLOAT;
        elseif ($t === 'rune' || $t === 'char') $t = Result::CHAR;
        elseif ($t === 'string') $t = Result::STRING;
        elseif ($t === 'bool') $t = Result::BOOL;
        
        return $isPointer ? $t . "_ptr" : $t;
    }
}

class Parametro {
    public $id;
    public $tipo;
    public $position;
    public $dimensiones = [];

    public function __construct($id, $tipo, $position) {
        $this->id = $id;
        $this->tipo = $tipo;
        $this->position = $position;
    }
}

class LocalVarCounter extends GrammarBaseVisitor {
    public $count = 0;

    public function visitVarDecl(\Context\VarDeclContext $ctx) {
        $slots = 1;
        $tipoCtx = $ctx->type();
        if ($tipoCtx instanceof \Context\TypeArrayDefContext) {
            $currType = $tipoCtx;
            while ($currType instanceof \Context\TypeArrayDefContext || $currType instanceof \Context\ArrayTypeContext) {
                $arrType = ($currType instanceof \Context\TypeArrayDefContext) ? $currType->arrayType() : $currType;
                if ($arrType->expression()) {
                    $slots *= intval($arrType->expression()->getText());
                }
                $nextType = $arrType->type();
                if ($nextType instanceof \Context\TypePrimitiveContext) {
                    break;
                } else {
                    $currType = $nextType;
                }
            }
        }
        $this->count += count($ctx->idList()->ID()) * $slots;
        return $this->visitChildren($ctx);
    }

    public function visitShortDecl(\Context\ShortDeclContext $ctx) {
        $slots = 1;
        $exprs = $ctx->exprList()->expression();
        if ($exprs !== null) {
            foreach ($exprs as $expr) {
                $text = $expr->getText();
                if (str_starts_with($text, '[')) {
                    preg_match_all('/\[(\d+)\]/', $text, $matches);
                    if (!empty($matches[1])) {
                        $subSlots = 1;
                        foreach ($matches[1] as $dim) {
                            $subSlots *= intval($dim);
                        }
                        $slots = max($slots, $subSlots);
                    }
                }
            }
        }
        $this->count += count($ctx->idList()->ID()) * $slots;
        return $this->visitChildren($ctx);
    }
}