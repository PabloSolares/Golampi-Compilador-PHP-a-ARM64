<?php

namespace App\Env;

class Symbol {
    const CLASE_VARIABLE = "variable";
    const CLASE_CONSTANTE = "constante";
    const CLASE_FUNCION = "funcion";

    public $tipo;
    public $clase;
    public $fila;
    public $col;
    public $valor;
    
    public $offset = 0;          
    public $params = null;       
    public $paramCount = 0;      
    public $localVarCount = 0;   
    public $totalSlots = 0;      

    public $tamano_int = 4;
    public $tamano_bool = 1;

    public function __construct($tipo= null, $valor = null, $clase = null, $fila = null, $col = null)
    {
        $this->tipo = $tipo;
        $this->valor = $valor;
        $this->clase = $clase;
        $this->fila = $fila;
        $this->col = $col;
    }

    public static function asResult($symbol) : Result {
        return new Result($symbol->tipo, $symbol->valor);
    }
}