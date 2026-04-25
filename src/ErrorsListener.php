<?php

use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
use Antlr\Antlr4\Runtime\Error\Listeners\BaseErrorListener;
use Antlr\Antlr4\Runtime\Recognizer;

class errorsListener extends BaseErrorListener{
    private $errors = [];

    public function syntaxError(Recognizer $recognizer, ?object $offendingSymbol, int $line, int $charPositionInLine, string $msg, ?RecognitionException $exception): void
    {
        $type = ($recognizer instanceof \Antlr\Antlr4\Runtime\Lexer) ? "Lexico" : "Sintactico";

        $errMsg = str_replace("token recognition error at: " , "Caracter no valido", $type);

        $this->errors[] = [
            'type' => $type,
            'line' => $line,
            'column' => $charPositionInLine,
            'msg' => $errMsg

        ];
    }


    public function hasErrors(): bool {
        return count($this->errors) > 0;
    }

    public function getErrors(): array {
        return $this->errors;
    }
}

?>