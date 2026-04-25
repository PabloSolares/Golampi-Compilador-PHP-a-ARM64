<?php

namespace App\AST\Sentencias;

use Context\PrintStmtContext;
use App\Env\Result;

trait PrintF
{
    public function visitPrintStmt(PrintStmtContext $ctx) {
        if ($ctx->exprList() !== null) {
            
            foreach ($ctx->exprList()->expression() as $expr) {
                
                $this->visit($expr);
                
                $this->asmGenerador->comment("Imprimiendo valor");
                
                $this->stack->popVal("x0");
                
                $this->asmGenerador->printInt();
            }
        }
        
        return Result::buildVacio();
    }
}