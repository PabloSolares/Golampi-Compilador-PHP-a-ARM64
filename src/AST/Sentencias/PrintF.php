<?php

namespace App\AST\Sentencias;

use App\ARM\Instruction;
use Context\PrintStmtContext;
use App\Env\Result;

trait PrintF
{
    public function visitPrintStmt(PrintStmtContext $ctx) {
        if ($ctx->exprList() !== null) {
            $this->asmGenerador->comment("--- IMPRESION ---");
            $exprs = $ctx->exprList()->expression();
            $totalExprs = count($exprs);

            for ($i = 0; $i < $totalExprs; $i++) {
                $expr = $exprs[$i];
                $result = $this->visit($expr);
                
                $this->stack->popVal("x1"); // Sacamos el valor a x1

                // Imprimir el tipo correspondiente
                if ($result->tipo === "nil") {
                    $this->asmGenerador->printPrintf("fmt_nil");
                } elseif ($result->tipo === Result::INT) {
                    $this->asmGenerador->printPrintf("fmt_int");
                } elseif ($result->tipo === Result::STRING) {
                    $this->asmGenerador->printPrintf("fmt_str");
                } elseif ($result->tipo === Result::FLOAT) {
                    $this->asmGenerador->instrucciones[] = new Instruction("fmov", "s0", "w1");
                    $this->asmGenerador->instrucciones[] = new Instruction("fcvt", "d0", "s0"); 
                    $this->asmGenerador->printPrintf("fmt_float");
                } elseif ($result->tipo === Result::CHAR) {
                    $this->asmGenerador->printPrintf("fmt_int"); // char se imprime como numero ASCII
                } elseif ($result->tipo === Result::BOOL) {
                    $lblTrue = $this->asmGenerador->generateLabel("bool_true");
                    $lblEnd = $this->asmGenerador->generateLabel("bool_end");

                    $this->asmGenerador->cmp("x1", "xzr");
                    $this->asmGenerador->bne($lblTrue); 

                    $lblFalse = $this->asmGenerador->addString("false");
                    $this->asmGenerador->ldrl("x1", $lblFalse);
                    $this->asmGenerador->b($lblEnd);

                    $this->asmGenerador->label($lblTrue);
                    $lblTrueStr = $this->asmGenerador->addString("true");
                    $this->asmGenerador->ldrl("x1", $lblTrueStr);

                    $this->asmGenerador->label($lblEnd);
                    $this->asmGenerador->printPrintf("fmt_str");
                }

                if ($i < $totalExprs - 1) {
                    $this->asmGenerador->printPrintf("fmt_space");
                }
            }
            
            $this->asmGenerador->printPrintf("fmt_newline");
        }
        
        return Result::buildVacio();
    }
}