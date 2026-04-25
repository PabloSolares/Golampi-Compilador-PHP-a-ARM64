<?php

namespace App\Stack;


class StackManager {
    private $code;
    private $stackOffset = 0;
    private $tempRegister = "x9";

    public function __construct($codeGenerate)
    {
       $this->code = $codeGenerate;
    }
    
    public function pushVal($reg){
        $this->code->subi("sp", "sp", 16);
        $this->code->str($reg, "sp");
        $this->stackOffset++;
    }

    public function popVal($desReg = null){
        if($desReg === null){
            $desReg = $this->tempRegister;
        }

        $this->code->ldr($desReg, "sp");
        $this->code->addi("sp", "sp", 16);
        $this->stackOffset--;
        return $desReg;
    }

    public function pushIn($in, $reg = null){
        if($reg === null){
            $reg = $this->tempRegister;
        }

        $this->code->li($reg, $in);
        $this->pushVal($reg);
    }

    public function popFree(){
        $this->popVal();
    }

    public function getStackOff(){
        return $this->stackOffset * 16;
    }

    public function adStack($slots){
        if($slots > 0){
            $this->code->addi("sp", "sp", $slots * 16);
            $this->stackOffset -= $slots;
        } elseif($slots){
            $this->code->subi("sp", "sp", abs($slots) * 16);
            $this->stackOffset += abs($slots);
        }
    }
}