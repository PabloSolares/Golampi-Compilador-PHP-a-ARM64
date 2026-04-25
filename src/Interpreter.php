<?php

use Context\AddSubExprContext;
use Context\AndExprContext;
use Context\ArrayAccessExprContext;
use Context\ArrayContentContext;
use Context\ArrayLiteralContext;
use Context\ArrayValuesContext;
use Context\AssingmentContext;
use Context\BlockContext;
use Context\BlockStmContext;
use Context\BreakStmContext;
use Context\ConstDeclContext;
use Context\ContinueStmContext;
use Context\DecrementContext;
use Context\DecrementStmContext;
use Context\DefereceExprContext;
use Context\ExprListContext;
use Context\ForDcl1Context;
use Context\ForDcl2Context;
use Context\ForDcl3Context;
use Context\FuncCallExprContext;
use Context\FuncStmtContext;
use Context\IdExprContext;
use Context\IfDclContext;
use Context\IncrementContext;
use Context\IncrementStmContext;
use Context\LenExprContext;
use Context\LenStmContext;
use Context\LiteralExprContext;
use Context\MultDivModExprContext;
use Context\NowExprContext;
use Context\OrExprContext;
use Context\ParExprContext;
use Context\PrintStmtContext;
use Context\ProgramContext;
use Context\RatExprContext;
use Context\ReferenceExprContext;
use Context\Return_stmtContext;
use Context\ShortDeclContext;
use Context\SubstrExprContext;
use Context\SwitchDclContext;
use Context\TypeArrayDefContext;
use Context\TypeOfExprContext;
use Context\TypePointerContext;
use Context\TypePrimitiveContext;
use Context\TypesStaticsContext;
use Context\UnaryMinusContext;
use Context\UnaryNotContext;
use Context\UnaryPlusContext;
use Context\VarDeclContext;



use GrammarBaseVisitor as GlobalGrammarBaseVisitor;

use function PHPSTORM_META\type;

class Interpreter extends GlobalGrammarBaseVisitor
{
    private $console;
    private $env;
    public $errors = [];
    public $symbolTable = [];
    public $currentScope = 'global';
    public function __construct()
    {
        $this->console = "";
        $this->env = new Enviroment(null, Enviroment::TYPE_GLOBAL);
    }
    // funcion para añadir a la tabla de simbolos cada que se ingresa un valor, funcion
    public function addSymbol($id, $type, $scope, $value, $ctx){
        $line = $ctx ? $ctx->getStart()->getLine() : 0;
        $col = $ctx ? $ctx->getStart()->getCharPositionInLine() : 0;

        if($value instanceof FunctionSymbol){
            $valueOut = "-"; // las funciones no tienen valor por defecto
        } elseif(is_array($value)){
            $valueOut = json_encode($value); 
        } elseif ($value instanceof Pointer) {
            $valueOut = "Puntero";
        } elseif (is_bool($value)) {
            $valueOut = $value ? "true" : "false";
        } elseif ($value === null) {
            $valueOut = "nil";
        } else {
            $valueOut = (string)$value; // si no es ninguna de las anteriores osea es una valor string, int ,float , rune
        }
        // se guardan
        $this->symbolTable[] = [
            'id' => $id,
            'tipo' => $type,
            'ambito' => $scope,
            'valor' => $valueOut,
            'linea' => $line,
            'columna' => $col
        ];
    }
    // se añande un error de tipo semantico
    public function addErr($msg, $ctx = null){
        $line = $ctx ? $ctx->getStart()->getLine() : 0;
        $col = $ctx ? $ctx->getStart()->getCharPositionInLine() : 0;

        $this->errors[] = [
            'type' => "Semantico",
            'line' => $line,
            'column' => $col,
            'msg' => $msg

        ];
    }

    public function visitProgram(ProgramContext $ctx)
    {
        // se lee todo el programa para despues ejecutarlo
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }

        // se verifica si existe una funcion main
        if($this->env->hasCurrent('main')){

            $mainFunc = $this->env->get('main');

            if($mainFunc instanceof FunctionSymbol){
                if (count($mainFunc->params) > 0) {
                    $this->addErr("Error Semantico: La función 'main' no debe tener parametros.", $ctx);
                }

                // entono para el main
                $globalEnv = $this->env->getGlobal();
                $mainEnv = new Enviroment($globalEnv, Enviroment::TYPE_FUNCTION);

                // se cambia al entorno del main
                $prevEnv = $this->env;
                $this->env = $mainEnv;

                $prevScope = $this->currentScope;
                $this->currentScope = 'main';

                try{
                    // se ejecuta el codigo del main
                    $this->visit($mainFunc->block);
                } finally{
                    // despues de que se ejecute todo lo del main se volvera al entorno global
                    $this->env = $prevEnv;
                    $this->currentScope = $prevScope; 
                }
            }
        } else {
           $this->addErr("Error semantico: No se definio la funcion 'main'.", $ctx);
        }
        return $this->console;
    }

    public function visitPrintStmt(PrintStmtContext $ctx)
    {

        if($ctx->exprList() !== null){
            $expressions = $ctx->exprList()->expression();

            foreach ($expressions as $expr) {
                $value = $this->visit($expr);
                if($value === null){
                    echo "nil";
                }
               else if(is_array($value)){
                    echo json_encode($value); // si es un arreglo
                } elseif (is_bool($value)) {
                    echo $value ? "true" : "false";
                } else {
                    echo $value;  
                }

                echo " ";
            }
        }
        echo "\n";
        return null;
    }

    public function visitVarDecl(VarDeclContext $ctx)
    {
        //string completo para validaciones 
        $typeVarString = $ctx->type()->getText();
        
        $listIds = [];
        foreach ($ctx->idList()->ID() as $node) {
            $listIds[] = $node->getText();
        }

        if ($ctx->exprList() !== null) {
            $values = $this->visit($ctx->exprList());
            
            if (!is_array($values)) $values = [$values];

            // si es un arreglo
            if (count($listIds) > 1 && count($values) === 1 && is_array($values[0])) {
                if (count($values[0]) === count($listIds)) {
                    $values = $values[0];
                }
            }

            if (count($values) !== count($listIds)) {
                $this->addErr("Error semantico: El numero de identificadores no coincide con el numero de expresiones", $ctx);
                return null;
            }
        } else {
            // si no vienen valores entonces se llena por los valores por defecto
            $defaultVal = $this->generateDefaultValueFromType($ctx->type());

            $values = array_fill(0, count($listIds), $defaultVal);
        }

        // SE ASIGNA LOS VALORES 
        for ($i = 0; $i < count($listIds); $i++) {
            $name = $listIds[$i];
            $val = $values[$i];

            if ($val instanceof Pointer) {
                    $this->addErr("Error Semantico: No se pueden guardar punteros en variables. Solo se usan por referencia en funciones.", $ctx);
                    $val = 0;
                }

            if ($this->env->hasCurrent($name)) {
                $this->addErr("Error Semantico: La variable '" . $name . "' ya ha sido declarada en este bloque.");
                continue;
            }


            if (!$this->checkType($val, $typeVarString)) {
                $typeactual = gettype($val);
                if (is_array($val)) $typeactual = "array";
                $this->addErr("Error Semantico: La variable '$name' es de tipo '$typeVarString' pero no coincide con el tipo de la expresion de tipo '$typeactual'");
                $val = $this->getDefaultValue($typeVarString);
            }

            $this->env->set($name, $val,  $typeVarString, false);

            $scope = ($this->env->getTypeEnv() === Enviroment::TYPE_GLOBAL) ? "global" : "main";
            $this->addSymbol($name, $typeVarString, $this->currentScope, $val, $ctx);
        }
        return null;
    }

    public function visitShortDecl(ShortDeclContext $ctx)
    {
        if ($this->env->getTypeEnv() !== Enviroment::TYPE_GLOBAL) {

            $listIds = [];

            foreach ($ctx->idList()->ID() as $node) {
                $listIds[] = $node->getText();
                }
                
            if ($ctx->exprList() !== null) {
                $values = $this->visit($ctx->exprList());
                if(!is_array($values)) $values = [$values];

                // funciones de retorno multiple

                if(count($listIds) > 1 && count($values) === 1 && is_array($values[0])){
                    if(count($values[0]) === count($listIds)){
                        $values = $values[0];
                    }
                }

                // SI COINCIDE TODOS LOS IDS CON LAS EXPRESIONES
                if (count($values) !== count($listIds)) {
                    $this->addErr("Error semantico: El numero de identificadores no coincide con el numero de expresiones", $ctx);
                    return null;
                }
            }


            // SE ASIGNA LOS VALORES 
            for ($i = 0; $i < count($listIds); $i++) {
                $name = $listIds[$i];
                $val = $values[$i];
               
                if ($val instanceof Pointer) {
                    $this->addErr("Error Semantico: No se pueden guardar punteros en variables. Solo se usan por referencia en funciones.", $ctx);
                    $val = 0;
                }

                $type = $this->getType(gettype($val), $val);
                // funcion para buscar si existe en el scope actual
                if ($this->env->hasCurrent($name)) {
                    $this->addErr("Error Semantico: La variable '" . $name . "' ya ha sido declarada en este bloque.", $ctx);
                    continue;
                }

                $this->env->set($name, $val,  $type, false);
                $this->addSymbol($name, $type, $this->currentScope, $val, $ctx);
            }
        } else {
            $this->addErr("ERROR semantico, LA DECLARACION CORTA NO SE PUEDE EN EL AMBIENTE GLOBAL" , $ctx);
        }
        return null;
    }


    public function visitConstDecl(ConstDeclContext $ctx)
    {
        $id = $ctx->ID()->getText();
        $typeDecl = $ctx->typesStatics()->getText();

        if ($ctx->expression() !== null) {

            $value = $this->visit($ctx->expression());

            if ($this->env->hasCurrent($id)) {
                $this->addErr("Error Semantico: La variable '" . $id . "' ya ha sido declarada en este bloque.", $ctx);
                return null;
            }
            if (!$this->checkType($value, $typeDecl)) {
                $typeActual = gettype($value);
                $this->addErr("Error semantico: La constante '$id' se declaro como '$typeDecl' pero se le asigno un valor de tipo '$typeActual'.", $ctx);
                $value = $this->getDefaultValue($typeDecl);
            }

            $this->env->set($id, $value,  $typeDecl, true);
            $scope = ($this->env->getTypeEnv() === Enviroment::TYPE_GLOBAL) ? "global" : "main";
            $this->addSymbol($id, "constante ($typeDecl)", $this->currentScope, $value, $ctx);
        } else {
            $this->addErr("Error Semantico: La variable '" . $id . "' tiene que ser inicializada", $ctx);
        }

        return null;
    }

    public function visitAssingment(AssingmentContext $ctx)
    {

        $vars = $ctx->assingExp();
        $values = $this->visit($ctx->exprList());
        if (!is_array($values)) $values = [$values];

        $ope = $ctx->typeAssing()->getText();
        // asingacion de variables normales
        if ($vars->idList() !== null) {
            $ids = [];

            // se guardan los ids en una arreglo
            foreach ($vars->idList()->ID() as $node) {
                $ids[] = $node->getText();
            }

            // si es un retorno de una funcion
            if (count($ids) > 1 && count($values) === 1 && is_array($values[0])) {
                if (count($values[0]) === count($ids)) {
                    $values = $values[0];
                }
            }

            if (count($values) !== count($ids)) {
                $this->addErr("Error semantico: El numero de identificadores no coincide con el numero de expresiones", $ctx);
                return null;
            }


            for ($i = 0; $i < count($ids); $i++) {
                $idName = $ids[$i];
                $newVal = $values[$i];

                if ($newVal instanceof Pointer) {
                    $this->addErr("No se pueden asignar punteros a variables normales.", $ctx);
                    continue;
                }
                // si no se ha declaro la variable
                if (!$this->env->has($idName)) {
                    $this->addErr("Variable '$idName' no declarada para asignacion.", $ctx);
                    continue;
                }

                if ($this->env->isConstant($idName)) {
                    $this->addErr("Error Semantico: No se puede modificar la constante '$idName'.", $ctx);
                    continue;
                }

                $actualValue = $this->env->get($idName);
                $expectedType = $this->env->getVarType($idName);

                $isPointer = false;
                $pointerObj = null;
                
                if ($actualValue instanceof Pointer) {
                    $isPointer = true;
                    $pointerObj = $actualValue;
                    $actualValue = $pointerObj->targetEnv->get($pointerObj->targetId);
                    $expectedType = ltrim($expectedType, '*'); 
                }

                if (!$this->checkType($newVal, $expectedType)) {
                    $typeExp = gettype($newVal);
                    $this->addErr("La variable '$idName' es de tipo '$expectedType' y se le intento asignar un valor de tipo '$typeExp'.", $ctx);
                    continue;
                }

                if ($ope !== '=') {
                    $newVal = $this->typeOperation($actualValue, $newVal, $ope);
                }

                if ($isPointer) {
                    // buscarmos en la clase del pointer el id para asi encontrar su valor y poder manejarlo
                    $pointerObj->targetEnv->assign($pointerObj->targetId, $newVal);
                } else {
                    $this->env->assign($idName, $newVal);
                }
            }
            return null;
        }

        if ($vars->factor() !== null) {
            
            
            $ptr = $this->visit($vars->factor());

            if (!($ptr instanceof Pointer)) {
                $this->addErr("Error semantico: asignacion invalido a indirección." , $ctx);
                return null;
            }

            $newValue = $values[0];
            if ($ope !== '=') {
                $actualValue = $ptr->targetEnv->get($ptr->targetId);
                $newValue = $this->typeOperation($actualValue, $newValue, $ope);
            }
 
            $ptr->targetEnv->assign($ptr->targetId, $newValue);
            
            return null;
        }

        // SI ES UN ARREGLO 
        if ($vars->arrayAccess() !== null) {

            $accessCtx = $vars->arrayAccess();

            $arrName = $accessCtx->ID()->getText();

            if (!$this->env->has($arrName)) {
                $this->addErr("Arreglo '$arrName' no declarado.", $ctx);
                return null;
            }

            $originalAr = $this->env->get($arrName);

            $isPointer = false;
            $pointerObj = null;

            if($originalAr instanceof Pointer){
                $isPointer = true;
                $pointerObj = $originalAr;
                $originalAr = $pointerObj->targetEnv->get($pointerObj->targetId);
            }


            if (!is_array($originalAr)) {
                $this->addErr("Error Semantico: '$arrName' no es un arreglo.");
                return null;

            }

            if (count($values) > 1) {
                $this->addErr("Error semantico: No se pueden asignar multiples valores a una posicion de array.", $ctx);
                return null;
            }

            $newValue = $values[0];

            $pointer = &$originalAr;

            $expressions = $accessCtx->expression();
            $totalDimensions = count($expressions);

            foreach ($expressions  as $i => $expr) {
                $index = $this->visit($expr);

                if (!is_int($index)) {
                    $this->addErr("Error semantico: Indice  debe ser entero.", $ctx);
                    return null;

                }
                if (!array_key_exists($index, $pointer)) {

                    $this->addErr("Error semantico: Indice $index fuera de rango.", $ctx);
                    return null;
                }

                if ($i === $totalDimensions - 1) {
                    if ($ope !== '=') {
                        $newValue = $this->typeOperation($pointer[$index], $newValue, $ope);
                    }

                    $pointer[$index] = $newValue;
                } else {
                    if (!is_array($pointer[$index])) {
                        $this->addErr("Error: Intentando acceder a un elemento que no es arreglo.", $ctx);
                        return null;
                    }
                    $pointer = &$pointer[$index];
                }
            }

            if($isPointer){
                $pointerObj->targetEnv->assign($pointerObj->targetId, $originalAr);
            } else {
                $this->env->assign($arrName, $originalAr);

            }


            return null;
        }
    }

    public function visitIfDcl(IfDclContext $ctx)
    {
        $previousEnv = $this->env;

        $this->env = new Enviroment($previousEnv, Enviroment::TYPE_BLOCK);

        try {
            // si es una declaracion manda a declere para que resuelva esa operacion
            if ($ctx->declareStmt() !== null) {
                $this->visit($ctx->declareStmt());
            }

            $cond = $this->visit($ctx->expression());


            if ($this->valueType($cond) !== 'bool') {
                $this->addErr("Error semantico: Sentencia if requiere condicion booleana.", $ctx);
                return false;
            }
            if ($cond == true) {
                // resuelve lo que viene entre { ... }
                return $this->visit($ctx->block(0));
            } elseif ($ctx->ELSE() !== null) {
                return $this->visit($ctx->block(1));
            }
        } finally {
            // depues del try vuelve al entorno anterior
            $this->env = $previousEnv;
        }

        return null;
    }

    public function visitSwitchDcl(SwitchDclContext $ctx)
    {
        $idCond = $this->visit($ctx->expression()); // valor del id que se va a evaluar
        $condType = $this->valueType($idCond);

        $previousEnv = $this->env;

        $this->env = new Enviroment($previousEnv, Enviroment::TYPE_BLOCK);

        try {

            foreach ($ctx->switchCase() as $case) {
                foreach ($case->exprList()->expression() as $exprCtx) {
                    $caseValue = $this->visit($exprCtx); // valor de cada caso 
                    

                    $caseType = $this->valueType($caseValue); // tipo del caso
                    

                    if ($caseType !== $condType) {
                        $this->addErr("Error semantico: Se esperaba '$condType' y se encontro con '$caseType'", $ctx);
                        continue;
                    }

                    if ($idCond == $caseValue) { // si coinciden el caso y la variable del switch se evaluan las expresiones del bloque 
                        foreach ($case->statement() as $stmt) {
                            $res = $this->visit($stmt);

                            if ($res !== null) return $res;
                        }
                        return null;
                    }
                }
            }
            // si existe el caso por defecto
            if ($ctx->caseDefault() !== null) {
                $default = $ctx->caseDefault();
                foreach ($default->statement() as $stmt) {
                    $res = $this->visit($stmt);

                    if ($res !== null) return $res;
                }
            }
        } finally {
            $this->env = $previousEnv;
        }
    }

    public function visitForDcl1(ForDcl1Context $ctx)
    {

        $previousEnv = $this->env;

        $this->env = new Enviroment($previousEnv, Enviroment::TYPE_LOOP);

        try {
            // se inicializa si es declaracion o asignacion
            $this->visit($ctx->for_init());
            while (true) {
                $cond = $this->visit($ctx->expression());

                if ($this->valueType($cond) !== 'bool') {
                    $this->addErr("Error semantico: Sentencia for requiere condicion booleana.", $ctx);
                    break;
                }

                if ($cond === false) break;

                // creamos un entorno de iteracion
                $iterEnv = $this->env;
                $this->env = new Enviroment($iterEnv, Enviroment::TYPE_BLOCK);

                $ret = $this->visit($ctx->block());

                // volvemos el entorno del ciclo antes de continuar
                $this->env = $iterEnv;

                if ($ret instanceof BreakType) {
                    break;
                } else if ($ret instanceof ContinueType) {
                    // continuar
                } else {
                    if ($ret !== null) return $ret;
                }

                $this->visit($ctx->forupdate());
            }
        } finally {
            $this->env = $previousEnv;
        }

        return null;
    }


    public function visitForDcl2(ForDcl2Context $ctx)
    {
        $previousEnv = $this->env;

        $this->env = new Enviroment($previousEnv, Enviroment::TYPE_LOOP);

        try {
            while (true) {
                $cond = $this->visit($ctx->expression());

                if ($this->valueType($cond) !== 'bool') {
                    $this->addErr("Error semantico: Sentencia for requiere condicion booleana.", $ctx);
                    break;
                }

                if ($cond === false) break;

                // creamos un entorno de iteracion

                $iterEnv = $this->env;
                $this->env = new Enviroment($iterEnv, Enviroment::TYPE_BLOCK);

                // se ejecuta el interior del if
                $ret = $this->visit($ctx->block());

                // volvemos el entorno del ciclo antes de continuar
                $this->env = $iterEnv;

                if ($ret instanceof BreakType) {
                    break;
                } else if ($ret instanceof ContinueType) {
                    // continuar
                } else {
                    if ($ret !== null) return $ret;
                }
            }
        } finally {
            $this->env = $previousEnv;
        }

        return null;
    }

    public function visitForDcl3(ForDcl3Context $ctx)
    {
        $previousEnv = $this->env;

        $this->env = new Enviroment($previousEnv, Enviroment::TYPE_LOOP);

        try {
            while (true) {

                // creamos un entorno de iteracion

                $iterEnv = $this->env;
                $this->env = new Enviroment($iterEnv, Enviroment::TYPE_BLOCK);

                $ret = $this->visit($ctx->block());

                 // volvemos el entorno del ciclo antes de continuar
                $this->env = $iterEnv;

                if ($ret instanceof BreakType) {
                    break;
                } else if ($ret instanceof ContinueType) {
                    // continuar
                } else {
                    if ($ret !== null) return $ret;
                }
            }
        } finally {
            $this->env = $previousEnv;
        }

        return null;
    }


    public function visitArrayLiteral(ArrayLiteralContext $ctx)
    {
        $values = $this->visit($ctx->arrayContent()); // valores que contrendra el arreglo
        
        $typeCtx = $ctx->arrayType();
        
        $baseType = $typeCtx->type()->getText(); // tipo del arreglo

        $sizeExp = $typeCtx->expression(); 

        $definedSize = -1;

        if ($sizeExp !== null) {
            $definedSize = $this->visit($sizeExp); // tamañod del arreglo
            
            if (!is_int($definedSize) || $definedSize < 0) {
                $this->addErr("Error Semantico: El tamaño del arreglo debe ser un numero entero y mayor que cero", $ctx);
                return [];
            }

            if (count($values) > $definedSize) {
                $this->addErr("Error Semantico: el arreglo tiene tamaño $definedSize y se intento definir" . count($values) . "elementos" , $ctx);
                $values = array_slice($values, 0, $definedSize);
            }

            if (count($values) < $definedSize) {
                $defaultVal = $this->defaultResult($baseType);
                while (count($values) < $definedSize) {
                    $values[] = $defaultVal;
                }
            }
        }

        foreach ($values as $val) {
            if (!$this->checkType($val, $baseType)) {
                $this->addErr("Error Semantico: Elemento '$val' no coincide con el tipo del arreglo '$baseType'." , $ctx);
            }
        }

        // si no hay ningun error devuelve el contenido
        return $values;
    }


    public function visitArrayContent(ArrayContentContext $ctx)
    {
        return $this->visit($ctx->arrayValues());
    }

    public function visitArrayValues(ArrayValuesContext $ctx)
    {
        $values = [];
        foreach ($ctx->children as $child) {
            if ($child->getText() === ',') continue;
            $values[] = $this->visit($child);
        }
        // regresa los valores del arreglo 
        return $values;
    }

    public function visitArrayAccessExpr(ArrayAccessExprContext $ctx)
    {
        $id = $ctx->arrayAccess()->ID()->getText(); // nombre del arreglo
        $currentVal = $this->env->get($id); // contenido del arreglo


        if($currentVal instanceof Pointer){
            $currentVal = $currentVal->targetEnv->get($currentVal->targetId);
        }

        

        if (!is_array($currentVal)) {
            $this->addErr("Error Semantico: la variable '$id' no es un arreglo", $ctx);
            return 0;

        }


        foreach ($ctx->arrayAccess()->expression() as $exp) {
            $index = $this->visit($exp); // indeice del arreglo
                

            if (!is_int($index)) {
                $this->addErr("Error Semantico: el indice debe ser un entero", $ctx);
                return 0;

            }

            if (!array_key_exists($index, $currentVal)) {
                $this->addErr("Error Semantico: el indice $index fuera de rango", $ctx);
                return 0;
            }
            $currentVal = $currentVal[$index];
        }
        // regresamos el valor del indice indicado del arreglo 
        return $currentVal;
    }


    public function visitFuncStmt(FuncStmtContext $ctx)
    {
        $name = $ctx->ID()->getText(); 

        $params = [];
        // se llena el arreglo de params
        if($ctx->funcParRet()->parameters() !== null){
            foreach ($ctx->funcParRet()->parameters()->paramDcl() as $param) {
                $type = $param->type()->getText();

                foreach($param->idList()->ID() as $idNode){
                    $params[] = ['name' => $idNode->getText(), 'type' => $type];
                }
            }
        }


        $returnType = "void";

        $resCtx = $ctx->funcParRet()->result();

        if($resCtx !== null){
            if(count($resCtx->type()) > 1){
                $returnType = [];
                foreach($resCtx->type() as $t) {
                    $returnType[] = $t->getText(); // se guarda el tipo de los retornos si son mas de 1 
                }
            } else {
                $returnType = $resCtx->type(0)->getText(); // si solo es un retorno

            }
        }


        $block = $ctx->block();
        $functionSymbol = new FunctionSymbol($returnType, $params, $block);

        if($this->env->hasCurrent($name)){
            $this->addErr("Error semantico: la funcion '$name' ya existe ", $ctx);
            return null;
        }

        $this->env->set($name, $functionSymbol, 'function', true); // se guarda en env
        $this->addSymbol($name, "función", $this->currentScope, $functionSymbol, $ctx);
        return null;

    }

    public function visitReturn_stmt(Return_stmtContext $ctx)
    {
        $values = [];
        $types = [];

        if($ctx->exprList() !== null){
            $rawValues = $this->visit($ctx->exprList());

            if(!is_array($rawValues)) $rawValues = [$rawValues];

            foreach ($rawValues as $val) {
                $values[] = $val;

                if($val instanceof Pointer){
                    $types[] = "pointer";

                } else {
                    $types[] = $this->valueType($val);
                }
            }
        }

        if(count($values) === 1) {
            return new ReturnType($values[0], $types[0]);
        }


        return new ReturnType($values, $types);
    }
        
    public function visitFuncCallExpr(FuncCallExprContext $ctx)
    {
        $name = $ctx->ID()->getText();
        $functionSymbol = $this->env->get($name);

        if(!($functionSymbol instanceof FunctionSymbol)){
            $this->addErr("Error semantico: la funcion '$name' no es una funcion ", $ctx);
            return null;
        }

        // se comeienza a buscar desde el entorno mayor
        $globalEnv = $this->env->getGlobal();
        $funcEnv = new Enviroment($globalEnv, Enviroment::TYPE_FUNCTION);


        $argValues = [];

        if($ctx->exprList() !== null){
            $argValues = $this->visit($ctx->exprList()); // se evaluan los argumentos
            if(!is_array($argValues)) $argValues = [$argValues];
        }

        $params = $functionSymbol->params;

        if(count($argValues) !== count($params)){
            $this->addErr("Error semantico: la funcion '$name' espera " . count($params) . " argumentos, se recibieron " . count($argValues), $ctx);
            return null;
        }


        for($i = 0; $i < count($params); $i++){
            $paramName = $params[$i]['name']; // parametros de la funcion
            $paramType = $params[$i]['type']; // tipo de los valores
            $argVal = $argValues[$i]; // los valores dentro de los parentesis

            if(strpos($paramType, '*') === 0){
                if(!($argVal instanceof Pointer)){
                    $this->addErr("Error semantico: el parametro '$paramName' espera un puntero ('$paramType')", $ctx);
                    return null;
                }

                $funcEnv->set($paramName, $argVal, $paramType, false);
            } else {
                if(!$this->checkType($argVal, $paramType)){
                    $this->addErr("Error semantico: Tipo incorrecto en argumento $i", $ctx);
                }
                $funcEnv->set($paramName, $argVal, $paramType, false);
            }

            $this->addSymbol($paramName, $paramType, $this->currentScope, $argVal, $ctx);
        }

        $previousEnv = $this->env;
        $this->env = $funcEnv;

        $prevScope = $this->currentScope;
        $this->currentScope = $name; 

        try {
            // se ejecuta la funcion
            $ret = $this->visit($functionSymbol->block);

            if($ret instanceof ReturnType){
                return $ret->value;
            }
        } finally {
            $this->env = $previousEnv;
            $this->currentScope = $prevScope; 
        }

        return null;
    }

    public function visitReferenceExpr(ReferenceExprContext $ctx)
    {
        $factor = $ctx->factor();

        if($factor instanceof IdExprContext){
            $varName = $factor->ID()->getText();

            if(!$this->env->has($varName)){
                $this->addErr("Error semantico: Variable '$varName' no definida.", $ctx);
                return null;
            }

            $targetEnv = $this->env->resolveEnv($varName);

            return new Pointer($targetEnv, $varName);
            
        }

        $this->addErr("Error semantico: El operador '&' solo aplica a identificadores.", $ctx);
        return null;
    }

    public function visitDefereceExpr(DefereceExprContext $ctx)
    {
        $val = $this->visit($ctx->factor());

        if($val instanceof Pointer){
            return $val->targetEnv->get($val->targetId);
        }

        $this->addErr("Error semantico: El operador '*' solo aplica a punteros.", $ctx);
        return 0;
    }

    public function visitBlockStm(BlockStmContext $ctx)
    {
        return $this->visit($ctx->block());
    }

    public function visitBlock(BlockContext $ctx)
    {
        foreach ($ctx->statement() as $stmt) {
            $res = $this->visit($stmt);

            if ($res !== null) {
                return $res;
            }
        }
        return null;
    }

    public function visitBreakStm(BreakStmContext $ctx)
    {
        if (!$this->env->isLoop()) {
            $this->addErr("Error Semantico: 'break' fuera de un ciclo.", $ctx);
            return null;    
        }
        return new BreakType();
    }

    public function visitContinueStm(ContinueStmContext $ctx)
    {
        if (!$this->env->isLoop()){ 
            $this->addErr("Error Semantico: 'continue' fuera de un ciclo.", $ctx);
            return null;
        };
        return new ContinueType();
    }

    public function visitExprList(ExprListContext $ctx)
    {
        $values = [];
        foreach ($ctx->expression() as $exp) {
            $values[] = $this->visit($exp);
        }
        return $values;  // regresa un arreglo con las expresiones
    }

    public function visitIncrement(IncrementContext $ctx)
    {
        $id = $ctx->ID()->getText();

        $actualValue = $this->env->get($id);
        $actualType = $this->valueType($actualValue);

        if (!$this->isNumber($actualType)) {
            $this->addErr("Error semantica: Operador '++' requiere un tipo numerico y se encontro '$actualType'.", $ctx);
            return 0;
        }

        if ($this->env->isConstant($id)) {
            $this->addErr("Error Semantico: No se puede aplicar '++' a la constante '$id'.", $ctx);
            return 0;
        }

        $newValue = ++$actualValue;
        $this->env->assign($id, $newValue);

        return $newValue;
    }

    public function visitDecrement(DecrementContext $ctx)
    {
        $id = $ctx->ID()->getText();

        $actualValue = $this->env->get($id);
        $actualType = $this->valueType($actualValue);

        if (!$this->isNumber($actualType)) {
            $this->addErr("Error Semantico: Operador '--' requiere un tipo numerico y se encontro '$actualType'.", $ctx);
            return 0;
        }

        if ($this->env->isConstant($id)) {
            $this->addErr("Error Semantico: No se puede aplicar '++' a la constante '$id'.", $ctx);
            return 0;
        }
        $newValue = --$actualValue;
        $this->env->assign($id, $newValue);

        return $newValue;
    }



    public function visitIncrementStm(IncrementStmContext $ctx)
    {
        $this->visit($ctx->increment());
        return null;
    }

    public function visitDecrementStm(DecrementStmContext $ctx)
    {
        $this->visit($ctx->decrement());
        return null;
    }

    public function visitTypesStatics(TypesStaticsContext $ctx)
    {
        return $ctx->getText();
    }

    public function visitOrExpr(OrExprContext $ctx)
    {
        $left = $this->visit($ctx->logicOr());

        if ($this->valueType($left) !== 'bool') {
            $this->addErr("Error Semnatico: Operador '||' requiere booleanos. Se encontró: " . $this->valueType($left), $ctx);
            return false;

        }

        if ($left === true) {
            return true;
        }

        $right = $this->visit($ctx->logicAnd());

        if ($this->valueType($right) !== 'bool') {
            $this->addErr("Error Semnatico: Operador '||' requiere booleanos. Se encontró: " . $this->valueType($right), $ctx);
            return false;

        }
 // si no hay error se evalua
        return $left || $right;
    }

   

    public function visitAndExpr(AndExprContext $ctx)
    {
        $left = $this->visit($ctx->logicAnd());

        if ($this->valueType($left) !== 'bool') {
            $this->addErr("Error Semnatico: Operador '&&' requiere booleanos. Se encontró: " . $this->valueType($left), $ctx);
            return false;
        }

        if ($left === false) {
            return false;
        }

        $right = $this->visit($ctx->expression_rational());

        if ($this->valueType($right) !== 'bool') {
            $this->addErr("Error Semnatico: Operador '&&' requiere booleanos. Se encontró: " . $this->valueType($right), $ctx);
            return false;
        }
 // si no hay error se evalua

        return $left && $right;
    }


    public function visitRatExpr(RatExprContext $ctx)
    {
        $left = $this->visit($ctx->expression_rational());
        $right = $this->visit($ctx->expression_arithmetic());
        $op = $ctx->getChild(1)->getText();

        if ($left === null || $right === null) {
            if ($op === '==') return $left === $right;
            if ($op === '!=') return $left !== $right;
            
            $this->addErr("Operacion relacional invalida con nil.", $ctx);
            return null;
        }

        $typeLeft = $this->valueType($left);
        $typeright = $this->valueType($right);

        switch ($op) {
            case '==':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left == $right;
                }
                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left == $right;
                }

                if ($typeLeft === 'bool' && $typeright === 'bool') {
                    return $left == $right;
                }
                $this->addErr("Error Semantico: Igualacion invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
            case '!=':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left != $right;
                }
                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left != $right;
                }

                if ($typeLeft === 'bool' && $typeright === 'bool') {
                    return $left != $right;
                }
                $this->addErr("Error Semantico: Desigualdad invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
            case '>':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left > $right;
                }

                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left > $right;
                }

                $this->addErr("Error Semantico: Mayor que invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
            case '<':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left < $right;
                }

                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left < $right;
                }

                $this->addErr("Error Semantico: Menor que invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
            case '>=':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left >= $right;
                }

                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left >= $right;
                }

                $this->addErr("Error Semantico: Mayor igual que invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
            case '<=':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left <= $right;
                }

                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left <= $right;
                }

                $this->addErr("Error Semantico: Menor igual que invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return false;
        }
        return false;
    }

    public function visitAddSubExpr(AddSubExprContext $ctx)
    {
        $left = $this->visit($ctx->expression_arithmetic());
        $right = $this->visit($ctx->term());
        $op = $ctx->getChild(1)->getText();
        if ($left === null || $right === null) {
            $this->addErr("Cualquier operacion  sobre nil es un error.", $ctx);
            return null;
        }

        $typeLeft = $this->valueType($left);
        $typeright = $this->valueType($right);

        switch ($op) {
            case '+':
                if ($typeLeft === 'string' && $typeright === 'string') {
                    return $left . $right;
                }

                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    if ($typeLeft === 'float' || $typeright === 'float') {
                        return (float)$left + $right;
                    }

                    return $left + $right;
                }
                $this->addErr("Error Semantico: Suma invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return 0;

            case '-':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left - $right;
                }
                $this->addErr("Error Semantico: Resta invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return 0;
        }
    }




    public function visitMultDivModExpr(MultDivModExprContext $ctx)
    {
        $left = $this->visit($ctx->term());
        $right = $this->visit($ctx->factor());
        $op = $ctx->getChild(1)->getText();
        
        if ($left === null || $right === null) {
            $this->addErr("Cualquier operacion  sobre nil es un error.", $ctx);
            return null;
        }

        $typeLeft = $this->valueType($left);
        $typeright = $this->valueType($right);

        switch ($op) {
            case '*':
                if ($this->isNumber($typeLeft) && $this->isNumber($typeright)) {
                    return $left * $right;
                }

                if ($typeLeft === 'string' && $typeright === 'int32') {
                    if ($right < 0) {$this->addErr("Error: No se puede repetir un string una cantidad negativa."); return "";};
                    return str_repeat($left, $right);
                }
                // Int * String 
                if ($typeLeft === 'int32' && $typeright === 'string') {
                    if ($left < 0){ $this->addErr("Error: No se puede repetir un string una cantidad negativa.", $ctx); return "";};
                    return str_repeat($right, $left);
                }

                $this->addErr("Error Semantico: Multiplicacion invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return 0;
                case '/':
                if (!$this->isNumber($typeLeft) && !$this->isNumber($typeright)) {
                    $this->addErr("Error Semantico: Division invalida entre '$typeLeft' y '$typeright'.", $ctx);
                    return 0;
                }

                if ($right === 0) {
                    $this->addErr("Error Semantico: Division entre 0", $ctx);
                    return 0;
                }

                if ($typeLeft === 'int32' && $typeright === 'int32') {
                    return intdiv($left, $right);
                }

                return $left / $right;

            case '%':
                if ($typeLeft === 'int32' && $typeright === 'int32') {
                    if ($right == 0) {$this->addErr("Error semantico: Módulo entre cero.", $ctx); return 0;};
                    return $left % $right;
                }
                $this->addErr("Error Semantico: Modulo invalida entre '$typeLeft' y '$typeright'.", $ctx);
                return 0;
        }
    }



    public function visitLiteralExpr(LiteralExprContext $context)
    {
        // regresa el valor dependiedo, por ejemplo si es un numero regresa el nuemero
        $literal = $context->literal();

        if ($literal->INT() !== null) {
            return intval($literal->INT()->getText());
        }
        if ($literal->FLOAT() !== null) {
            return floatval($literal->FLOAT()->getText());
        }

        if ($literal->STRING() !== null) {
            $rawString = substr($literal->STRING()->getText(), 1, -1);
            
            return stripcslashes($rawString);
        }

        if ($literal->TRUE() !== null) {
            return true;
        }
        if ($literal->FALSE() !== null) {
            return false;
        }

        if ($literal->CHAR() !== null) {
            $char = substr($literal->CHAR()->getText(), 1, -1);
            return mb_ord($char, "UTF-8");
        }

        if ($literal->NIL() !== null) {
            return null;
        }

        if ($literal->arrayLiteral() !== null) {
            return $this->visit($literal->arrayLiteral());
        }

        return null;
    }

    
    public function visitParExpr(ParExprContext $ctx)
    {
        return $this->visit($ctx->expression());
    }

    
    public function visitUnaryMinus(UnaryMinusContext $ctx)
    {
        $val = $this->visit($ctx->factor());
        
        if (!$this->isNumber($this->valueType($val))) {
            $this->addErr("Error semantico: No se puede aplicar '-' a un valor no numerico.", $ctx);
            return 0;

        }
        
        return -$val;
    }

    public function visitUnaryNot(UnaryNotContext $ctx){
        $val = $this->visit($ctx->factor());

        if ($this->valueType($val) !== 'bool') {
            $this->addErr("Error semantico: El operador NOT (!) solo aplica a valores booleanos.", $ctx);
            return false;
        }

        return !$val;
    }

    public function visitUnaryPlus(UnaryPlusContext $ctx)
    {
        $val = $this->visit($ctx->factor());
        
        if (!$this->isNumber($this->valueType($val))) {
            $this->addErr("Error semantico: No se puede aplicar '+' a un valor no numerico.", $ctx);
            return 0;
        }
        
        return $val; 
    }

    public function visitIdExpr(IdExprContext $ctx)
    {
        $id = $ctx->ID()->getText();
        if (!$this->env->has($id)) {
            $this->addErr("Uso de variable no declarada: '$id'.", $ctx);
            return 0; 
        }
        $val = $this->env->get($id);
        
       
        if ($val instanceof Pointer) {
            return $val->targetEnv->get($val->targetId);
        }
        
        return $val;
    }

    public function visitLenStm(LenStmContext $ctx)
    {
                
        $param = $this->visit($ctx->expression());
        if(is_array($param)){
            return count($param);
        } else if(is_string($param)){
            return strlen($param);
        } else {
            $this->addErr("Error semantico: para la funcion len() solo se acepta de tipo string y arreglos", $ctx);
        }

        return 0;

    }

    public function visitNowExpr(NowExprContext $ctx)
    {
        date_default_timezone_set('America/Guatemala');

        return date('Y-m-d H:i:s');

    }

    public function visitSubstrExpr(SubstrExprContext $ctx)
    {   
        $params = [];
        foreach ($this->visit($ctx->exprList()) as  $param) {
            $params[] = $param; 
        }

        if (count($params) !== 3) {
            $this->addErr("Error semantico: la función substr espera exactamente 3 argumentos.", $ctx);
            return ""; 
        }
        
        if(!is_string($params[0])){
            $this->addErr("Error semantico: el tipo de la cadena tiene que ser string", $ctx);
            return "";
        }

        $lenString = mb_strlen($params[0], "UTF-8");

        if (!is_int($params[1]) || !is_int($params[2])) {
            $this->addErr("Error semantico: el indice inicial y la longitud deben ser enteros.", $ctx);
            return "";
        }

        if ($params[1]< 0 || $params[1]>= $lenString ) {
            $this->addErr("Error semantico: el indice inicial ($params[1]) esta fuera de rango.", $ctx);
            return "";
        }

        if ($params[2] < 0) {
            $this->addErr("Error semantico: la longitud no puede ser negativa.", $ctx);
            return "";
        }


        if ($params[1] + $params[2] > $lenString) {
            $this->addErr("Error semantico: los indices ($params[1] + $params[2]) exceden el tamaño de la cadena ($lenString).", $ctx);
            return "";
        }


        return substr($params[0], $params[1], $params[2]);



    }

    public function visitTypeOfExpr(TypeOfExprContext $ctx)
    {
        $val = $this->visit($ctx->expression());

        return $this->valueType($val);
    }


    private function getDefaultValue($type)
    {
        switch ($type) {
            case 'int':
            case 'int32':
                return 0;
            case 'float32':
            case 'float':
                return 0.0;
            case 'bool':
                return false;
            case 'rune':
            case 'char':
                return 0;
            case 'string':
                return "";
            default:
                return null;
        }
    }

    private function checkType($val, $type)
    {
        switch ($type) {
            case 'int':
            case 'int32':
                return is_int($val);
            case 'float':
            case 'float32':
                return is_float($val);
            case 'bool':
                return is_bool($val);
            case 'string':
                return is_string($val);


            case 'char':
            case 'rune':
                return is_int($val);

            default:
                if (strpos($type, '[') !== false) {
                    return is_array($val);
                }
                return true;
        }
    }

   private function getType($phpType, $val)
    {
        if ($val instanceof Pointer) return 'pointer';
        if (is_array($val)) return 'array';

        switch ($phpType) {
            case 'integer': return 'int';
            case 'double': return 'float';
            case 'boolean': return 'bool';
            case 'string': 
             
                return (mb_strlen($val) === 1) ? 'char' : 'string';
            default:
                return 'unknown';
        }
    }

    private function typeOperation($current, $new, $op)
    {
        switch ($op) {
            case '+=':
                return $current + $new;
            case '-=':
                return $current - $new;
            case '*=':
                return $current * $new;
            case '/=':
                return $current / $new;
            default:
                return $new;
        }
    }

    private function valueType($value)
    {
        if (is_int($value)) return 'int32';
        if (is_float($value)) return 'float32';
        if (is_bool($value)) return 'bool';
        if (is_string($value)) return 'string';
        return 'null';
    }

    private function isNumber($type)
    {
        return $type === 'int32' || $type === 'float32';
    }


    private function generateDefaultValueFromType($ctx)
    {

        if ($ctx instanceof TypePrimitiveContext) {
            $typeName = $ctx->typesStatics()->getText();
            return $this->getDefaultValue($typeName);
        }


        if ($ctx instanceof TypeArrayDefContext) {
            $arrayCtx = $ctx->arrayType();


            $sizeExpr = $arrayCtx->expression();
            if ($sizeExpr === null) return [];

            $size = $this->visit($sizeExpr);

            $innerTypeCtx = $arrayCtx->type();

            $defaultElement = $this->generateDefaultValueFromType($innerTypeCtx);

            return array_fill(0, $size, $defaultElement);
        }


        if ($ctx instanceof TypePointerContext) {
            return null;
        }


        return null;
    }
}


class FunctionSymbol
{
    public $type;
    public $params;
    public $block;

    public function __construct($type, $params, $block)
    {
        $this->type = $type;
        $this->params = $params;
        $this->block = $block;

    }
}


class ReturnType
{
    public $value;
    public $type;

    public function __construct($value, $type)
    {
        $this->value = $value;
        $this->type = $type;

    }
}

class Pointer
{
    public $targetEnv;
    public $targetId;

    public function __construct($targetEnv, $targetId)
    {
        $this->targetEnv = $targetEnv;
        $this->targetId = $targetId;

    }
}