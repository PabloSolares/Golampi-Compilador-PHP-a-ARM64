<?php
namespace App\Ast\exprs;

use App\Env\Result;

trait ArrayOperations {
    
    public function visitArrayLiteral(\Context\ArrayLiteralContext $ctx) {
        $this->asmGenerador->comment("--- EVALUANDO ARREGLO LITERAL ---");
        
        $dimensiones = [];
        $currArrayType = $ctx->arrayType();
        
        while ($currArrayType !== null) {
            if ($currArrayType->expression() !== null) {
                $dimensiones[] = intval($currArrayType->expression()->getText());
            }
            $innerType = $currArrayType->type();
            if ($innerType !== null && $innerType instanceof \Context\TypeArrayDefContext) {
                $currArrayType = $innerType->arrayType();
            } else {
                $currArrayType = null;
            }
        }
        
        $valores = [];
        $this->recolectarValores($ctx->arrayContent(), $valores);
        
        $innerType = Result::INT; 
        foreach ($valores as $expr) {
            $innerRes = $this->visit($expr); 
            $innerType = $innerRes->tipo; 
        }
        
        $slots = count($valores);
        if (empty($dimensiones)) $dimensiones = [$slots]; 
        
        $res = Result::buildVacio();
        $res->tipo = $innerType; 
        $res->slots = $slots;
        $res->dimensiones = $dimensiones;
        return $res;
    }

    private function recolectarValores($node, &$values) {
        if ($node instanceof \Context\ExpressionContext) {
            $values[] = $node;
            return;
        }
        if (is_object($node) && method_exists($node, 'getChildCount')) {
            $hijos = $node->getChildCount();
            for ($i = 0; $i < $hijos; $i++) {
                $this->recolectarValores($node->getChild($i), $values);
            }
        }
    }

    public function visitArrayAccess(\Context\ArrayAccessContext $ctx) {
        $idName = $ctx->ID()->getText();
        $symbol = $this->env->get($idName);
        
        if ($symbol === null) {
            $this->addErr("Error Semantico: Arreglo '$idName' no declarado.", $ctx);
            return Result::buildVacio();
        }

        $tipoBase = is_array($symbol->tipo) ? $symbol->tipo[0] : $symbol->tipo;
        $tipoBaseLimpio = str_replace("_ptr", "", (string)$tipoBase);

        
        if ($tipoBaseLimpio === Result::STRING && empty($symbol->dimensiones)) {
            $this->asmGenerador->comment("--- LECTURA DE CARACTER EN STRING: $idName ---");
            
            $this->visit($ctx->expression()[0]); 
            $this->stack->popVal("x10"); // x10 contiene el indice
            
            $this->asmGenerador->ldr("x11", "x29", "-" . $symbol->offset);
            
            $this->asmGenerador->add("x12", "x11", "x10");
            
            $this->asmGenerador->instrucciones[] = new \App\ARM\Instruction("ldrb", "w9", "[x12]");
            
            $this->stack->pushVal("x9");
            
            return Result::stack(Result::CHAR, $this->stack->getStackOff());
        }

        // lectura normal
        $this->asmGenerador->comment("--- LECTURA DE ARREGLO: $idName ---");
        $this->calculateArrayOffset($symbol, $ctx);
        
        $this->asmGenerador->ldr("x9", "x16", 0);
        $this->stack->pushVal("x9");
        
        return Result::stack($tipoBaseLimpio, $this->stack->getStackOff());
    }

    public function calculateArrayOffset($symbol, $arrayAccessCtx) {
        $exprs = $arrayAccessCtx->expression();
        $dims = isset($symbol->dimensiones) ? $symbol->dimensiones : [];
        
        if (count($exprs) == 1) {
            $this->visit($exprs[0]);
            $this->stack->popVal("x11"); 
            $this->asmGenerador->mov("x14", "x11"); 
        } else {
            $this->asmGenerador->mov("x14", "xzr");
            for ($i = 0; $i < count($exprs); $i++) {
                $this->visit($exprs[$i]);
                $this->stack->popVal("x11"); 
                
                if ($i > 0) {
                    $dimValue = isset($dims[$i]) ? $dims[$i] : 1;
                    $this->asmGenerador->mov("x12", $dimValue);
                    $this->asmGenerador->mul("x14", "x14", "x12");
                    $this->asmGenerador->add("x14", "x14", "x11");
                } else {
                    $this->asmGenerador->mov("x14", "x11");
                }
            }
        }
        
        $tipoBase = is_array($symbol->tipo) ? $symbol->tipo[0] : $symbol->tipo;
        $isPointer = (isset($symbol->isParamArray) && $symbol->isParamArray) || str_contains((string)$tipoBase, "_ptr");

        if ($isPointer) {
            $this->asmGenerador->ldr("x12", "x29", "-" . $symbol->offset);
            $this->asmGenerador->mov("x13", 16);
            $this->asmGenerador->mul("x15", "x14", "x13");
            $this->asmGenerador->sub("x16", "x12", "x15"); 
        } else {
            $this->asmGenerador->mov("x12", $symbol->offset);
            $this->asmGenerador->mov("x13", 16);
            $this->asmGenerador->mul("x15", "x14", "x13");
            $this->asmGenerador->add("x16", "x12", "x15"); 
            $this->asmGenerador->sub("x16", "x29", "x16"); 
        }           
    }
}