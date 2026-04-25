<?php

namespace App\Ast\exprs;

use Context\RatExprContext;
use Context\AndExprContext;
use Context\OrExprContext;
use Context\UnaryNotContext;
use App\Env\Result;

trait Booleanas
{
    public function visitRatExpr(RatExprContext $ctx)
    {
        $this->visit($ctx->expression_rational());
        $this->visit($ctx->expression_arithmetic());

        $op = $ctx->getChild(1)->getText();
        $this->asmGenerador->comment("Relacional: " . $op);

        $right = $this->stack->popVal();
        $left = $this->stack->popVal();

        $this->asmGenerador->cmp($left, $right);

        switch ($op) {
            case '<':  $this->asmGenerador->cset("x9", "lt"); break;
            case '<=': $this->asmGenerador->cset("x9", "le"); break;
            case '>':  $this->asmGenerador->cset("x9", "gt"); break;
            case '>=': $this->asmGenerador->cset("x9", "ge"); break;
            case '==': $this->asmGenerador->cset("x9", "eq"); break;
            case '!=': $this->asmGenerador->cset("x9", "ne"); break;
        }

        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOffset());
    }

    public function visitAndExpr(AndExprContext $ctx){
        $this->visit($ctx->logicAnd());
        $this->visit($ctx->expression_rational());

        $this->asmGenerador->comment("Logico: AND && ");

        $right = $this->stack->popVal();
        $left = $this->stack->popVal();

        $this->asmGenerador->and_op("x9", $left, $right);
        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOffset());

    }

    public function visitOrExpr(OrExprContext $ctx){
        $this->visit($ctx->logicOr());
        $this->visit($ctx->logicAnd());

        $this->asmGenerador->comment("Logico: OR || ");

        $right = $this->stack->popVal();
        $left = $this->stack->popVal();

        $this->asmGenerador->and_op("x9", $left, $right);
        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOffset());

    }

     public function visitUnaryNot(UnaryNotContext $ctx){
        $this->visit($ctx->factor());

        $this->asmGenerador->comment("Logico: NOT ! ");
        
        $opReg = $this->stack->popVal();

        $this->asmGenerador->cmp($opReg, "xzr");
        $this->asmGenerador->cset("x9", "eq");


        $this->stack->pushVal("x9");
        return Result::stack(Result::BOOL, $this->stack->getStackOffset());

    }
}
