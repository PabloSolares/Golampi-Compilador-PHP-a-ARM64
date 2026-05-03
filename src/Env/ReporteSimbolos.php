<?php
namespace App\Env;

class ReporteSimbolos {
    private static $simbolos = [];

    public static function add($id, $tipoInterno, $ambito, $valor, $linea, $columna, $isArray = false) {
        $tipoTraducido = self::traducirTipo($tipoInterno, $isArray);
        
        self::$simbolos[] = [
            'id' => $id,
            'tipo' => $tipoTraducido,
            'ambito' => $ambito,
            'valor' => $valor,
            'linea' => $linea,
            'columna' => $columna
        ];
    }

    private static function traducirTipo($tipo, $isArray) {
        if ($isArray || str_contains((string)$tipo, 'arreglo') || is_array($tipo)) {
            return 'arreglo';
        }
        $t = str_replace('_ptr', '', (string)$tipo);
        
        if ($t === 'int' || $t === 'int32') return 'entero';
        if ($t === 'float' || $t === 'float32') return 'decimal';
        if ($t === 'string') return 'cadena';
        if ($t === 'char' || $t === 'rune') return 'caracter';
        if ($t === 'bool') return 'booleano';
        if ($t === 'funcion' || $t === 'función') return 'función';
        
        return $t;
    }

    public static function getSimbolos() {
        return self::$simbolos;
    }

    public static function clear() {
        self::$simbolos = [];
    }
}