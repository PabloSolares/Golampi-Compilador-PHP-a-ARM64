<?php

namespace App\Ast\Sentencias;

use App\ARM\Instruction;
use Context\VarDeclContext;
use Context\ShortDeclContext;
use Context\AssingmentContext;
use Context\IdExprContext;
use App\Env\Symbol;
use App\Env\Result;
use Context\ConstDeclContext;
use Context\TypeArrayDefContext;
use Context\ReferenceExprContext;
use Context\DefereceExprContext;
use App\Env\ReporteSimbolos;
trait Variables
{
    private function normalizeType($type) {
        if ($type === null) return Result::NULO;
        $t = $type;
        $isPointer = false;
        if(str_starts_with($t, '*')) {
            $isPointer = true;
            $t = substr($t, 1);
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

    public function visitConstDecl(ConstDeclContext $ctx) {
        $id = $ctx->ID()->getText();
        $tipoDeclarado = $this->normalizeType($ctx->typesStatics()->getText());

        if ($this->env->has($id)) {
            $this->addErr("Error Semantico: La constante '$id' ya fue declarada.", $ctx);
            return Result::buildVacio();
        }

        $symbol = new Symbol($tipoDeclarado, Symbol::CLASE_VARIABLE);
        $this->env->set($id, $symbol);
        $offset = $this->env->allocateVarOffset($id);

        $linea = $ctx->getStart()->getLine();
        $columna = $ctx->getStart()->getCharPositionInLine();
        $ambito = $this->compiler->currentFunction ?? "global"; 
        
        $valorStr = "—";
        if ($ctx->expression() !== null) {
            $valorStr = $ctx->expression()->getText();
        }

        ReporteSimbolos::add($id, $tipoDeclarado, $ambito, $valorStr, $linea, $columna, false); 

        $this->asmGenerador->comment("Declaracion de Constante: " . $id);

        $exprRes = $this->visit($ctx->expression());
        $valReg = $this->stack->popVal("x9");

        if ($tipoDeclarado === Result::FLOAT && ($exprRes->tipo === Result::INT || $exprRes->tipo === Result::CHAR)) {
            $wValReg = "w" . str_replace("x", "", $valReg);
            $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", $wValReg);
            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s0");
            $valReg = "x9";
        }

        $this->asmGenerador->str($valReg, "x29", "-" . $offset);
        return Result::buildVacio();
    }

    public function visitVarDecl(VarDeclContext $ctx) {
        $ids = $ctx->idList()->ID();
        $tipoCtx = $ctx->type();

        $tipoDeclarado = "desconocido";
        $isArray = false;
        $slots = 1;
        $dimensiones = [];

        if ($tipoCtx instanceof TypeArrayDefContext) {
            $isArray = true;
            $currType = $tipoCtx;
            while ($currType instanceof TypeArrayDefContext || $currType instanceof \Context\ArrayTypeContext) {
                $arrType = ($currType instanceof TypeArrayDefContext) ? $currType->arrayType() : $currType;
                if ($arrType->expression()) {
                    $dimensiones[] = intval($arrType->expression()->getText());
                }
                $nextType = $arrType->type();
                if ($nextType instanceof \Context\TypePrimitiveContext) {
                    $tipoDeclarado = $this->normalizeType($nextType->typesStatics()->getText());
                    break;
                } else {
                    $currType = $nextType;
                }
            }
            foreach ($dimensiones as $d) $slots *= $d;
        } else {
            $tipoDeclarado = $this->normalizeType($tipoCtx->getText());
        }

        $offsets = [];
        foreach ($ids as $i => $idNode) {
            $id = $idNode->getText();
            if ($this->env->has($id)) {
                $this->addErr("Error Semantico: La variable '$id' ya declarada.", $ctx);
                return Result::buildVacio(); 
            }
            $symbol = new Symbol($tipoDeclarado, Symbol::CLASE_VARIABLE);
            $symbol->slots = $slots;
            $symbol->dimensiones = $dimensiones;
            $this->env->set($id, $symbol);
            $offsets[] = $this->env->allocateVarOffset($id, $slots);

            $linea = $idNode->getSymbol()->getLine();
            $columna = $idNode->getSymbol()->getCharPositionInLine();
            $ambito = $this->compiler->currentFunction ?? "global"; 
            
            $valorStr = "—";
            if ($ctx->exprList() !== null && isset($ctx->exprList()->expression()[$i])) {
                $exprNode = $ctx->exprList()->expression()[$i];
                if (count($exprNode->children) == 1 || $isArray) { 
                    $valorStr = $exprNode->getText();
                }
            }
            
            ReporteSimbolos::add($id, $tipoDeclarado, $ambito, $valorStr, $linea, $columna, $isArray);
        }

        $this->asmGenerador->comment("Declaracion de variables: " . $ctx->idList()->getText());

        if ($ctx->exprList() !== null) {
            $exprs = $ctx->exprList()->expression();
            if ($isArray) {
                $this->visit($exprs[0]);
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $baseOffset = $offsets[$i];
                    for ($j = $slots - 1; $j >= 0; $j--) {
                        $valReg = $this->stack->popVal("x9");
                        $currentOffset = $baseOffset + ($j * 16);  
                        $this->asmGenerador->str($valReg, "x29", "-" . $currentOffset);
                    }
                }
            } else {
                $tiposEvaluados = [];
                foreach ($exprs as $exprCtx) {
                    $tiposEvaluados[] = $this->visit($exprCtx)->tipo;
                }
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $valReg = $this->stack->popVal("x9");
                    $this->asmGenerador->str($valReg, "x29", "-" . $offsets[$i]);
                }
            }
        } else {
            if ($tipoDeclarado === Result::STRING) {
                $labelEmpty = $this->asmGenerador->addString(""); 
                $this->asmGenerador->ldrl("x9", $labelEmpty);
            } else {
                $this->asmGenerador->mov("x9", "xzr"); 
            }

            if ($isArray) {
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $baseOffset = $offsets[$i];
                    for ($j = $slots - 1; $j >= 0; $j--) {
                        $currentOffset = $baseOffset + ($j * 16);
                        $this->asmGenerador->str("x9", "x29", "-" . $currentOffset);
                    }
                }
            } else {
                for ($i = count($ids) - 1; $i >= 0; $i--) {
                    $this->asmGenerador->str("x9", "x29", "-" . $offsets[$i]);
                }
            }
        }
        return Result::buildVacio();
    }

    public function visitShortDecl(ShortDeclContext $ctx) {
        $ids = $ctx->idList()->ID();
        $exprs = $ctx->exprList()->expression(); 
        $offsets = [];
        $simbolos = [];
        
        $this->asmGenerador->comment("Declaracion corta: " . $ctx->idList()->getText());

        if (count($ids) > 1 && count($exprs) === 1) {
            $res = $this->visit($exprs[0]); 
            $tiposValor = is_array($res->tipo) ? $res->tipo : [$res->tipo];
            
            for ($i = 0; $i < count($ids); $i++) {
                $id = $ids[$i]->getText();
                $t = isset($tiposValor[$i]) ? $tiposValor[$i] : Result::INT;
                $simbolo = new Symbol($t, Symbol::CLASE_VARIABLE);
                $this->env->set($id, $simbolo);
                $offsets[] = $this->env->allocateVarOffset($id);
                $simbolos[] = $simbolo;
                
                $linea = $ids[$i]->getSymbol()->getLine();
                $columna = $ids[$i]->getSymbol()->getCharPositionInLine();
                $ambito = $this->compiler->currentFunction ?? "global"; 
                $valorStr = $exprs[0]->getText();
                ReporteSimbolos::add($id, $t, $ambito, $valorStr, $linea, $columna, false);
            }
        } else {
            for ($i = 0; $i < count($ids); $i++) {
                $id = $ids[$i]->getText();
                $exprCtx = $exprs[$i]; 
                $valorEvaluado = $this->visit($exprCtx);
                
                $simbolo = new Symbol($valorEvaluado->tipo, Symbol::CLASE_VARIABLE);
                $isArray = false;
                if (!empty($valorEvaluado->dimensiones)) {
                    $simbolo->dimensiones = $valorEvaluado->dimensiones;
                    if (str_contains((string)$valorEvaluado->tipo, "_ptr")) {
                        $simbolo->slots = 1;
                    } else {
                        $simbolo->slots = $valorEvaluado->slots ?? 1;
                        $isArray = true;
                    }
                }
                
                $this->env->set($id, $simbolo);
                $offsets[] = $this->env->allocateVarOffset($id, $simbolo->slots ?? 1);
                $simbolos[] = $simbolo;

                $linea = $ids[$i]->getSymbol()->getLine();
                $columna = $ids[$i]->getSymbol()->getCharPositionInLine();
                $ambito = $this->compiler->currentFunction ?? "global"; 
                $valorStr = $exprCtx->getText();
                ReporteSimbolos::add($id, $valorEvaluado->tipo, $ambito, $valorStr, $linea, $columna, $isArray);
            }
        }

        for ($i = count($ids) - 1; $i >= 0; $i--) {
            if (!empty($simbolos[$i]->dimensiones) && $simbolos[$i]->slots > 1) { 
                $slots = $simbolos[$i]->slots;
                $baseOffset = $offsets[$i];
                for ($j = $slots - 1; $j >= 0; $j--) {
                    $valReg = $this->stack->popVal("x9");
                    $currentOffset = $baseOffset + ($j * 16); 
                    $this->asmGenerador->str($valReg, "x29", "-" . $currentOffset);
                }
            } else {
                $valReg = $this->stack->popVal("x9");
                $this->asmGenerador->str($valReg, "x29", "-" . $offsets[$i]);
            }
        }
        return Result::buildVacio();
    }

    public function visitAssingment(AssingmentContext $ctx) {
        $vars = $ctx->assingExp();
        $ope = $ctx->typeAssing()->getText();
        $exprs = $ctx->exprList()->expression();

        if ($vars->idList() !== null) {
            $ids = $vars->idList()->ID();
            
            if (count($ids) > 1 && count($exprs) === 1) {
                $res = $this->visit($exprs[0]);
                $tiposValor = is_array($res->tipo) ? $res->tipo : [$res->tipo];
            } else {
                $tiposValor = [];
                foreach ($exprs as $exp) {
                    $tiposValor[] = $this->visit($exp)->tipo;
                }
            }

            $offsetsDestino = [];
            $tiposDestino = [];

            for ($i = 0; $i < count($ids); $i++) {
                $idName = $ids[$i]->getText();
                $symbol = $this->env->get($idName);
                $offsetsDestino[] = $symbol->offset;
                $tiposDestino[] = $symbol->tipo;
            }

            $this->asmGenerador->comment("Reasignacion de variables ($ope)");
            
            for ($i = count($ids) - 1; $i >= 0; $i--) {
                $valReg = $this->stack->popVal("x9");
                $offset = $offsetsDestino[$i];
                $tipoDest = $tiposDestino[$i];
                $tipoVal = $tiposValor[$i];

                if ($ope === "=") {
                    if ($tipoDest === Result::FLOAT && ($tipoVal === Result::INT || $tipoVal === Result::CHAR)) {
                        $wValReg = "w" . str_replace("x", "", $valReg);
                        $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", $wValReg);
                        $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s0");
                        $valReg = "x9";
                    }
                    $this->asmGenerador->str($valReg, "x29", "-$offset");
                } else {
                    $this->generarAsignacionCompuesta($tipoDest, $tipoVal, $ope, $valReg, "x29", "-$offset");
                }
            }
        } elseif ($vars->arrayAccess() !== null){
            $arrayAccessCtx = $vars->arrayAccess();
            $idName = $arrayAccessCtx->ID()->getText();
            $symbol = $this->env->get($idName);

            $this->asmGenerador->comment("--- ASIGNACION A ARREGLO: $idName ($ope) ---");
            
            // Evaluamos lo que vamos a guardar y lo protegemos en x19
            $valorAsignar = $this->visit($exprs[0]);
            $valueReg = $this->stack->popVal("x19"); 
            
            // Calculamos donde lo vamos a guardar
            $this->calculateArrayOffset($symbol, $arrayAccessCtx);
            
            //  Ejecutamos la asignación usando x19 y x16
            if ($ope === "=") {
                if ($symbol->tipo === Result::FLOAT && ($valorAsignar->tipo === Result::INT || $valorAsignar->tipo === Result::CHAR)) {
                    $wValueReg = "w" . str_replace("x", "", $valueReg);
                    $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s0", $wValueReg);
                    $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w9", "s0");
                    $valueReg = "x9";
                }
                $this->asmGenerador->str($valueReg, "x16", 0);
            } else {
                $this->generarAsignacionCompuesta($symbol->tipo, $valorAsignar->tipo, $ope, $valueReg, "x16", 0);
            }
        } elseif ($vars->MULT() !== null) { 
            // asignacion de un puntero
            $this->asmGenerador->comment("--- ASIGNACION POR PUNTERO (*) ---");
            
            $valorAsignar = $this->visit($exprs[0]);
            $valueReg = $this->stack->popVal("x19");
            
            $this->visit($vars->factor());
            $addrReg = $this->stack->popVal("x11");
            
            if ($ope === "=") {
                $this->asmGenerador->str($valueReg, "x11", 0); // Escribimos en la direccion de memoria del puntero
            } else {
                $this->generarAsignacionCompuesta(Result::INT, $valorAsignar->tipo, $ope, $valueReg, "x11", 0);
            }
        }
        return Result::buildVacio();
    }
    
    public function visitIdExpr(IdExprContext $ctx) {
        $id = $ctx->ID()->getText();
        $this->asmGenerador->comment("Lectura de variable: " . $id);
        $symbol = $this->env->get($id);
        
        // Si es un arreglo pasamos la direccion
        if (!empty($symbol->dimensiones) || $symbol->slots > 1) {
            if (str_contains((string)$symbol->tipo, "_ptr") || isset($symbol->isParamArray)) {
                $this->asmGenerador->ldr("x9", "x29", "-" . $symbol->offset);
            } else {
                $this->asmGenerador->mov("x10", $symbol->offset);
                $this->asmGenerador->sub("x9", "x29", "x10");
            }
            $this->stack->pushVal("x9");
            
            $tipoFinal = $symbol->tipo;
            if (!str_contains((string)$tipoFinal, "_ptr")) $tipoFinal .= "_ptr";
            
            $res = Result::stack($tipoFinal, $this->stack->getStackOff());
            $res->dimensiones = $symbol->dimensiones;
            return $res;
        }

        $this->asmGenerador->ldr("x9", "x29", "-" . $symbol->offset);
        $this->stack->pushVal("x9");
        return Result::stack($symbol->tipo, $this->stack->getStackOff());
    }

    private function generarAsignacionCompuesta($tipoDestino, $tipoValor, $ope, $regNuevo, $regBase, $offsetValue) {
        $this->asmGenerador->ldr("x20", $regBase, $offsetValue);
        if ($tipoDestino === Result::FLOAT) {
            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w20");
            $wRegNuevo = "w" . str_replace("x", "", $regNuevo); 
            if ($tipoValor === Result::INT || $tipoValor === Result::CHAR) {
                $this->asmGenerador->instrucciones[] = new Instruction("scvtf", "s1", $wRegNuevo);
            } else {
                $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s1", $wRegNuevo);
            }
            if ($ope === "+=") $this->asmGenerador->instrucciones[] = new Instruction("fadd", "s2", "s0", "s1");
            if ($ope === "-=") $this->asmGenerador->instrucciones[] = new Instruction("fsub", "s2", "s0", "s1");
            if ($ope === "*=") $this->asmGenerador->instrucciones[] = new Instruction("fmul", "s2", "s0", "s1");
            if ($ope === "/=") $this->asmGenerador->instrucciones[] = new Instruction("fdiv", "s2", "s0", "s1");

            $this->asmGenerador->instrucciones[] = new Instruction("fmov", "w21", "s2");
            $regFinal = "x21";

        } elseif ($tipoDestino === Result::STRING && $ope === "+=") {
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x0", "x20");
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x1", $regNuevo);
            $this->asmGenerador->instrucciones[] = new Instruction("bl", "concat_strings");
            $this->asmGenerador->instrucciones[] = new Instruction("mov", "x21", "x0");
            $regFinal = "x21";

        } else {
            if ($ope === "+=") $this->asmGenerador->add("x21", "x20", $regNuevo);
            if ($ope === "-=") $this->asmGenerador->sub("x21", "x20", $regNuevo);
            if ($ope === "*=") $this->asmGenerador->mul("x21", "x20", $regNuevo);
            if ($ope === "/=") $this->asmGenerador->div("x21", "x20", $regNuevo);
            $regFinal = "x21";
        }
        if ($offsetValue === 0 || $offsetValue === "0") {
            $this->asmGenerador->str($regFinal, $regBase, 0);
        } else {
            $this->asmGenerador->str($regFinal, $regBase, $offsetValue);
        }
    }

    public function visitReferenceExpr(ReferenceExprContext $ctx) {
        $id = $ctx->factor()->getText();
        $symbol = $this->env->get($id);
        $this->asmGenerador->comment("Referencia & de variable: " . $id);
        $this->asmGenerador->mov("x10", $symbol->offset);
        $this->asmGenerador->sub("x9", "x29", "x10"); // Calculamos y enviamos su direccion en memoria
        $this->stack->pushVal("x9");
        $tipoBase = is_array($symbol->tipo) ? $symbol->tipo[0] : $symbol->tipo;
        return Result::stack($tipoBase . "_ptr", $this->stack->getStackOff());
    }

    public function visitDefereceExpr(DefereceExprContext $ctx) {
        $this->asmGenerador->comment("Desreferencia (*)");
        $res = $this->visit($ctx->factor());
        $addrReg = $this->stack->popVal("x10");
        $this->asmGenerador->ldr("x9", "x10", 0); // Leemos el valor guardado en esa direccion
        $this->stack->pushVal("x9");
        $tipoBase = str_replace("_ptr", "", (string)$res->tipo);
        return Result::stack($tipoBase, $this->stack->getStackOff());
    }
}