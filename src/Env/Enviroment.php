<?php

namespace App\Env;

class Enviroment {
    private $father;
    private $values;
    
    // --- NUEVO: Control de memoria en la pila (Stack) de ARM64 ---
    private $currentOffset = 0; 

    const TYPE_GLOBAL = 'GLOBAL';
    const TYPE_FUNCTION = 'FUNCTION';
    const TYPE_LOOP = 'LOOP';
    const TYPE_BLOCK = 'BLOCK';
    
    public $typeEnv;

    public function __construct($father = null, $typeEnv = self::TYPE_BLOCK) {
        if($father !== null && !($father instanceof Enviroment)){
            throw new \InvalidArgumentException("father must be an Environment or null");
        }

        $this->father = $father;
        $this->values = [];
        $this->typeEnv = $typeEnv;
    }


    public function allocateVarOffset($key, $slots = 1) {
        $startOffset = $this->currentOffset + 16;
        
        $this->currentOffset += (16 * $slots); 
        
        if (isset($this->values[$key])) {
            $this->values[$key]->offset = $startOffset;
            $this->values[$key]->slots = $slots; 
        }
        
        return $startOffset;
    }

    public function getVarOffset($key) {
        $symbol = $this->get($key);
        return isset($symbol->offset) ? $symbol->offset : 0;
    }

   
    public function set($key, $value){
        $this->values[$key] = $value;
    }

    public function get($key): Symbol {
        $exists = array_key_exists($key, $this->values);
        if($exists){
            return $this->values[$key];
        }

        if(!$exists && $this->father !== null){
            return $this->father->get($key);
        }

        throw new \Exception("Variable: '" . $key ."' no definida.");
    }

    public function getGlobal()
    {
        $env = $this;
        while ($env->father !== null) {
            $env = $env->father;
        }
        return $env;
    }
    

    public function assign($key, $value) {    
        if (array_key_exists($key, $this->values)) {
            $this->values[$key] = $value;
            return;
        }
        if ($this->father !== null) {
            return $this->father->assign($key, $value);
        }
        throw new \Exception("Variable: ". $key ." no definida.");    
    }

    public function hasCurrent($key)
    {
        return array_key_exists($key, $this->values);
    }

    public function has($key)
    {
        if (array_key_exists($key, $this->values)) {
            return true;
        }

        if ($this->father !== null) {
            return $this->father->has($key);
        }

        return false;
    }
}