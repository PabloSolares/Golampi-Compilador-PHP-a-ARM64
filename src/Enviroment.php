<?php

class Enviroment
{
    const TYPE_GLOBAL = 'GLOBAL';
    const TYPE_FUNCTION = 'FUNCTION';
    const TYPE_LOOP = 'LOOP';
    const TYPE_BLOCK = 'BLOCK';

    public $father;
    public $values;
    public $typeEnv;

    public function __construct($father = null, $typeEnv = self::TYPE_BLOCK)
    {
        if ($father !== null && !($father instanceof Enviroment)) {
            throw new InvalidArgumentException("father must be an Environment or null");
        }
        $this->father = $father;
        $this->values = [];
        $this->typeEnv = $typeEnv;
    }

    public function set($key, $value,  $type, $isConst = false )
    {
        $this->values[$key] = [
            'value' =>  $value,
            'type' => $type,
            'isConst' => $isConst
        ];
    }

    public function get($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key]['value'];
        }

        if ($this->father !== null) {
            return $this->father->get($key);
        }

        return null;
    }

    
    public function getVarType($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key]['type'];
        }

        if ($this->father !== null) {
            return $this->father->getVarType($key);
        }

        return 'unknown';
    }


    public function assign($key, $value)
    {

        if (array_key_exists($key, $this->values)) {
            if($this->values[$key]['isConst']){
                return false;
            }

            $this->values[$key]['value'] = $value;
            return true;
        }
        
        if ($this->father !== null) {
            return $this->father->assign($key, $value);
            
        }
        return false;
    }

    public function getTypeEnv()
    {
        return $this->typeEnv;
    }

    public function isLoop(){
        if($this->typeEnv === self::TYPE_LOOP){
            return true;
        }

        if($this->father !== null){
            return $this->father->isLoop();
        }

        return false;
    }
    
    public function isConstant($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this->values[$key]['isConst'];
        }
        if ($this->father !== null) {
            return $this->father->isConstant($key);
        }
        return false;
    }
    public function getGlobal()
    {
        $env = $this;
        while ($env->father !== null) {
            $env = $env->father;
        }
        return $env;
    }
    public function hasCurrent($key)
    {
        return array_key_exists($key, $this->values);
    }

    public function resolveEnv($key)
    {
        if (array_key_exists($key, $this->values)) {
            return $this;
        }

        if ($this->father !== null) {
            return $this->father->resolveEnv($key);
        }

        return null;
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