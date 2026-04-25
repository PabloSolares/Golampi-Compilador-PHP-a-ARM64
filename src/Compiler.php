<?php

namespace App;

use App\AST\Sentencias\FunctionGenerator;
use App\Env\Result;
use App\Stack\StackManager;
use Context\BlockContext;
use Context\FunctionStmContext;
use Context\ProgramContext;
use App\Env\Enviroment;
use GrammarBaseVisitor;

class Compiler extends GrammarBaseVisitor  {
    use \App\AST\exprs\Aritmeticas;
    use \App\AST\exprs\Booleanas;
    use \App\AST\exprs\Primitivos;
    use \App\AST\exprs\FunctionCall;
    use \App\AST\Sentencias\PrintF;
    use \App\AST\Sentencias\FunctionDeclaracion;
    use \App\AST\Sentencias\Transferencia;
    use \App\AST\Sentencias\IfStatement;
    use \App\AST\Sentencias\Variables;
    use \App\AST\Sentencias\Ciclos;



    public $asmGenerador;
    public $stack;
    public $env;
    public $errors = [];
    public $loopStack = [];

    private $functionGenerator;
    private $functionSymbols = []; 

    public function __construct(){
        $this->asmGenerador = new \App\ARM\ASMGenerator();
        $this->stack = new StackManager($this->asmGenerador);
        $this->env = new Enviroment(null, Enviroment::TYPE_GLOBAL);
        $this->functionGenerator = new FunctionGenerator($this->asmGenerador, $this->stack, $this->env, $this);
    }

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

    public function visitProgram(ProgramContext $ctx){
        
        foreach($ctx->statement() as $stmt){
            if($stmt instanceof FunctionStmContext){
                $this->visit($stmt); 
                
                $this->functionSymbols[] = $stmt->funcStmt();
            }
        }

        try {
            $this->env->get("main");
            
            $this->asmGenerador->comment("--- PUNTO DE ENTRADA -----");
            $this->asmGenerador->bl("func_main");
            
        } catch (\Exception $th) {
            $this->addErr("Error Semantico: La funcion 'main' no esta definida en el archivo" , $ctx);
        }
        
        $this->asmGenerador->endProgram();

        foreach($this->functionSymbols as $funCtx){
            $funName = $funCtx->ID()->getText();
            $symbol = $this->env->get($funName);
            $this->functionGenerator->generateFunction($funName, $symbol);
        }

        return $this->asmGenerador;
    }

    public function visitBlock(BlockContext $ctx){
        foreach ($ctx->statement() as $stmt) {
            $this->visit($stmt);
        }
        return Result::buildVacio();
    }

    public function visitExprList(\Context\ExprListContext $ctx) {
        foreach ($ctx->expression() as $exp) {
            $this->visit($exp);
        }
        return Result::buildVacio();
    }
}