<?php 

namespace App\ARM;


class Instruction {
    
    public $instr;
    public $op1;
    public $op2;
    public $op3;
    

    public function __construct($instr, $op1=null, $op2=null, $op3=null) {
        $this->instr = $instr;
        $this->op1 = $op1;
        $this->op2 = $op2;
        $this->op3 = $op3;

    }

    public  function __toString(){
        $ops = [];
        if($this->op1 !== null ) $ops[] = $this->op1;
        if($this->op2 !== null ) $ops[] = $this->op2;
        if($this->op3 !== null ) $ops[] = $this->op3;
        if(count($ops) === 0 ) return $this->instr;

        return $this->instr . " " . implode(", ", $ops);
    }
}


class ASMGenerator {
    public $instrucciones = [];
    private $r;
    private $labelCounter = 0;
    private $functionLabels = [];
    private $strings = [];
    private $stringCounter = 0;

    public function __construct() {
        $this->r = include __DIR__ . "/Constants.php";
    }


    public function generateLabel($prefix = "label"){
        $label = $prefix . "_" .  $this->labelCounter;
        $this->labelCounter++;
        return $label;
    }

    public function addString($text){
        $label = "msg_" . $this->stringCounter++;

        $this->strings[$label] = trim($text, '"'); // eliminamos "
        return $label;
    }


    public function add($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("add", $rd, $rs1, $rs2);
    }

    public function sub($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("sub", $rd, $rs1, $rs2);
    }

    public function mul($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("mul", $rd, $rs1, $rs2);
    }

    public function div($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("sdiv", $rd, $rs1, $rs2);
    }

    public function and_op($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("and", $rd, $rs1, $rs2);
    }

    public function orr($rd, $rs1, $rs2) {
        $this->instrucciones[] = new Instruction("orr", $rd, $rs1, $rs2);
    }

    public function mvn($rd, $rs) {
        $this->instrucciones[] = new Instruction("mvn", $rd, $rs);
    }

    public function cmp($rs1, $rs2) {
        $this->instrucciones[] = new Instruction("cmp", $rs1, $rs2);
    }

    public function cset($rd, $cond) {
        $this->instrucciones[] = new Instruction("cset", $rd, $cond);
    }

    public function addi($rd, $rs1, $imm) {
        $this->instrucciones[] = new Instruction("add", $rd, $rs1, "#".$imm);
    }

    public function subi($rd, $rs1, $imm) {
        $this->instrucciones[] = new Instruction("sub", $rd, $rs1, "#".$imm);
    }

    public function str($rs, $base, $offset=0) {
        $val = intval(str_replace('#', '', $offset));

        if ($val < -256 || $val > 255) {
            $absVal = abs($val);
            $this->instrucciones[] = new Instruction("mov", "x16", "#" . $absVal);
            if ($val < 0) {
                $this->instrucciones[] = new Instruction("sub", "x16", $base, "x16");
            } else {
                $this->instrucciones[] = new Instruction("add", "x16", $base, "x16");
            }
            // se guarda la direccion calculada
            $this->instrucciones[] = new Instruction("str", $rs, "[x16]");
        } else {
            // si esta dentro del rango 
            $this->instrucciones[] = new Instruction("str", $rs, "[".$base.", #".$val."]");
        }
    }

    public function ldr($rd, $base, $offset=0) {
        $val = intval(str_replace('#', '', $offset));

        if ($val < -256 || $val > 255) {
            $absVal = abs($val);
            $this->instrucciones[] = new Instruction("mov", "x16", "#" . $absVal);
            if ($val < 0) {
                $this->instrucciones[] = new Instruction("sub", "x16", $base, "x16");
            } else {
                $this->instrucciones[] = new Instruction("add", "x16", $base, "x16");
            }
            // se carga la direccion calculada

            $this->instrucciones[] = new Instruction("ldr", $rd, "[x16]");
        } else {            
            // si esta dentro del rango 

            $this->instrucciones[] = new Instruction("ldr", $rd, "[".$base.", #".$val."]");
        }
    }

    public function ldrl($rd, $label) {
        $this->instrucciones[] = new Instruction("ldr", $rd, "=".$label);
    }

    public function li($rd, $imm) {
        $this->instrucciones[] = new Instruction("mov", $rd, "#".$imm);
    }

    public function mov($rd, $rs) {
        $this->instrucciones[] = new Instruction("mov", $rd, $rs);
    }

    public function bl($label) {
        $this->instrucciones[] = new Instruction("bl", $label);
    }

    public function ret() {
        $this->instrucciones[] = new Instruction("ret");
    }

    public function br($reg) {
        $this->instrucciones[] = new Instruction("br", $reg);
    }

    public function b($label) {
        $this->instrucciones[] = new Instruction("b", $label);
    }

    public function beq($label) {
        $this->instrucciones[] = new Instruction("b.eq", $label);
    }

    public function bne($label) {
        $this->instrucciones[] = new Instruction("b.ne", $label);
    }

    public function blt($label) {
        $this->instrucciones[] = new Instruction("b.lt", $label);
    }

    public function ble($label) {
        $this->instrucciones[] = new Instruction("b.le", $label);
    }

    public function bgt($label) {
        $this->instrucciones[] = new Instruction("b.gt", $label);
    }

    public function bge($label) {
        $this->instrucciones[] = new Instruction("b.ge", $label);
    }

    public function label($name) {
        $this->instrucciones[] = new Instruction($name . ":");
    }

    public function registerFunction($name, $label) {
        $this->functionLabels[$name] = $label;
    }

    public function getFunctionLabel($name) {
        return $this->functionLabels[$name] ?? null;
    }

    public function push($rd=null) {
        if ($rd === null) $rd = $this->r["T0"];
        $this->subi($this->r["SP"], $this->r["SP"], 16);
        $this->str($rd, $this->r["SP"]);
    }

    public function pop($rd=null) {
        if ($rd === null) $rd = $this->r["T0"];
        $this->ldr($rd, $this->r["SP"]);
        $this->addi($this->r["SP"], $this->r["SP"], 16);
    }

    public function syscall() {
        $this->instrucciones[] = new Instruction("svc", "#0");
    }

    public function printPrintf($formatLabel){
        $this->ldrl("x0", $formatLabel);
        $this->bl("printf");

    }

    public function printNewLine() {
        $this->comment("Salto de línea");
        $this->li($this->r["A0"], 1);
        $this->ldrl($this->r["A1"], "newline");
        $this->li($this->r["A2"], 1);
        $this->li($this->r["SYS"], 64);
        $this->syscall();
    }

    public function printInt($rd = null) {
        if ($rd === null) $rd = $this->r["A0"];

        $this->bl("itoa");
        $this->mov($this->r["A2"], $this->r["A1"]);
        $this->mov($this->r["A1"], $this->r["A0"]);
        $this->li($this->r["A0"], 1);
        $this->li($this->r["SYS"], 64);
        $this->syscall();
        $this->printNewLine();
    }

    public function endProgram() {
        $this->comment("Fin del programa");

        $this->li($this->r["A0"], 0);
        $this->instrucciones[] = new Instruction("ldp", "x29", "x30", "[sp], 16");
        $this->ret();
    }

    public function comment($text) {
        $this->instrucciones[] = new Instruction("// ".$text);
    }

    public function itoa() {
        $itoa = "itoa:\n";
        $itoa .= "ldr x2, =buffer\n";
        $itoa .= "add x2, x2, #31\n";
        $itoa .= "mov w3, #0\n";
        $itoa .= "strb w3, [x2]\n";
        $itoa .= "mov x4, #10\n";
        $itoa .= "mov x5, x0\n";
        $itoa .= "cmp x5, #0\n";
        $itoa .= "b.ge loop \n";
        $itoa .= "neg x5, x5\n";
        $itoa .= "loop:\n";
        $itoa .= "udiv x6, x5, x4\n";
        $itoa .= "msub x7, x6, x4, x5\n";
        $itoa .= "add x7, x7, #48\n";
        $itoa .= "sub x2, x2, #1\n";
        $itoa .= "strb w7, [x2]\n";
        $itoa .= "mov x5, x6\n";
        $itoa .= "cbnz x6, loop\n";
        $itoa .= "cmp x0, #0 \n";
        $itoa .= "bge done_itoa \n";
        $itoa .= "mov w7, #45 \n";
        $itoa .= "sub x2, x2, #1 \n";
        $itoa .= "strb w7, [x2] \n";
        $itoa .= "done_itoa: \n";
        
        $itoa .= "ldr x3, =buffer\n";
        $itoa .= "add x3, x3, #31\n";
        $itoa .= "sub x1, x3, x2\n";
        $itoa .= "mov x0, x2\n";
        $itoa .= "ret\n";
        return $itoa;
    }

    public function rodata(){
        $rodata = ".section .rodata\n";
        $rodata .= "fmt_int: .asciz \"%d\"\n";
        $rodata .= "fmt_float: .asciz \"%.7g\"\n";
        $rodata .= "fmt_str: .asciz \"%s\"\n";
        $rodata .= "fmt_char: .asciz \"%c\"\n";
        
        $rodata .= "fmt_space: .asciz \" \"\n";
        $rodata .= "fmt_newline: .asciz \"\\n\"\n";
        $rodata .= "fmt_nil: .asciz \"<nil>\"\n";


        foreach ($this->strings as $label => $text) {
            $rodata .= "$label: .asciz \"$text\"\n";
        }

        return $rodata;
    }

    public function addFunctionInstructions($instructions) {
        $this->instrucciones = array_merge($this->instrucciones, $instructions);
    }

    public function getConcatRoutine() {
        return <<<ASM
        .section .bss
        string_heap: .skip 8192      // 8KB de memoria para nuevas cadenas
        string_heap_ptr: .quad 0     // Puntero a la memoria libre

        .section .text
        // Funciones de inicializacion y concatenacion
        init_heap:
            ldr x0, =string_heap
            ldr x1, =string_heap_ptr
            str x0, [x1]
            ret

        concat_strings:
            ldr x2, =string_heap_ptr
            ldr x3, [x2]             
            mov x4, x3               
        copy_str1:
            ldrb w5, [x0], #1        
            cbz w5, copy_str2        
            strb w5, [x3], #1        
            b copy_str1
        copy_str2:
            ldrb w5, [x1], #1        
            cbz w5, done_concat      
            strb w5, [x3], #1        
            b copy_str2
        done_concat:
            strb wzr, [x3], #1       
            str x3, [x2]             
            mov x0, x4               
            ret

        // len
        string_length:
            // Parametro: x0 = puntero al string. Retorno: x0 = longitud
            mov x1, 0                
        count_loop:
            ldrb w2, [x0], #1        
            cbz w2, done_length      
            add x1, x1, 1            
            b count_loop
        done_length:
            mov x0, x1               
            ret

        // substr
        substring:
            // x0 = str_ptr, x1 = start, x2 = length. Retorno: x0 = nuevo_str_ptr
            ldr x3, =string_heap_ptr
            ldr x4, [x3]          
            mov x5, x4            // guardamos inicio para retornar

            add x0, x0, x1        // avanza el puntero fuente hasta 'start'

        copy_substr:
            cbz x2, done_substr   // Si length == 0 se termina
            ldrb w6, [x0], #1     // Leemos 1 byte
            cbz w6, done_substr   // Si encontramos '\0' antes de tiempo se termina 
            strb w6, [x4], #1     // Guardamos en el heap
            sub x2, x2, 1         // length--
            b copy_substr

        done_substr:
            strb wzr, [x4], #1    // Ponemos '\0' al final
            str x4, [x3]          // Actualizamos puntero del heap
            mov x0, x5            // Retornamos la nueva cadena
            ret
        ASM;
            }

   
    public function toString() {
        $out = ".global main\n";
        $out .= ".section .text\n";
        $out .= "main:\n";
        $out .= "   stp x29, x30, [sp, -16]!\n";
        $out .= "   mov x29, sp\n";
        $out .= "   bl init_heap\n";
        foreach ($this->instrucciones as $inst) {
            $out .= "    ".$inst."\n";
        }

        
        $out .= $this->rodata();
        $out .= $this->getConcatRoutine();
        return $out;
    }
}