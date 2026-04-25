grammar Grammar;

// Regla inicial
program: statement+ EOF;

statement
    : declareStmt SEMICOLON?        # DeclStmt 
    | assignStmt SEMICOLON?         # AssignStm
    | printStmt SEMICOLON?          # PrintStm
    | constStmt SEMICOLON?          # ConstStm
    | ifStmt                        # ifStm
    | switchStmt                    # switchStm
    | forStmt                       # ForStm
    | break_stmt                    # BreakStm
    | continue_stmt                 # ContinueStm
    | arrayAssign                   # ArrayAssingStm
    | funcStmt                      # FunctionStm
    | return_stmt                   # ReturnStm
    | increment SEMICOLON?          # IncrementStm
    | decrement SEMICOLON?          # DecrementStm
    | funcAccess SEMICOLON?         # CallStm
  
    | block                         # BlockStm
    ;

block
    : KEY_OPEN statement* KEY_CLOSE
    ;

printStmt
    : FMT_PRINT PAR_OPEN exprList?  PAR_CLOSE 
    ;

declareStmt
    :  VAR idList type (EQUAL exprList)?             # VarDecl
    |  idList COLON_EQUAL exprList                           # ShortDecl
    ;
constStmt
    : CONST ID typesStatics EQUAL expression                 # constDecl
    ;

idList
    : ID (COMMA ID)*
    ;

assignStmt
    : assingExp typeAssing exprList # Assingment
    ;

assingExp
    : arrayAccess 
    | MULT factor
    | idList
    ;

typeAssing
    : (EQUAL | ADD_ASSING | SUB_ASSING | MULT_ASSING | DIV_ASSING | MOD_ASSING )
    ;

ifStmt
    : IF (declareStmt SEMICOLON)? expression block (ELSE block )? # IfDcl
    ;

switchStmt 
    : SWITCH expression KEY_OPEN switchCase* caseDefault?  KEY_CLOSE # SwitchDcl  // si es obligatorio el default lo dejo asi, si no le pongo el ? 
    ;
switchCase
    : (CASE exprList COLON statement*)
    ;
caseDefault
    : DEFAULT COLON statement*
    ;

forStmt
    : FOR for_init SEMICOLON expression SEMICOLON forupdate block                     # ForDcl1
    | FOR expression block                                                            # ForDcl2
    | FOR block                                                                       # ForDcl3
    ;

for_init
    : declareStmt
    | assignStmt
    ;

break_stmt
    : BREAK SEMICOLON?
    ;
continue_stmt
    : CONTINUE SEMICOLON?
    ;
return_stmt
    : RETURN exprList? SEMICOLON?
    ;

arrayAssign
    : ID arrayDimension typeAssing expression  SEMICOLON?                           # AsingArray
    ;

arrayDimension
    : (CLASP_OPEN expression CLASP_CLOSE)+
    ;

arrayLiteral
    : arrayType arrayContent
    ;

arrayContent
    : KEY_OPEN arrayValues COMMA?  KEY_CLOSE 
    ;

arrayValues
    : (expression | arrayContent ) (COMMA (expression | arrayContent))* 
    ;

arrayAccess
    : ID (CLASP_OPEN expression CLASP_CLOSE)+
    ;

forupdate
    : increment
    | decrement
    | assignStmt
    ;

increment
    : ID PLUS PLUS
    ;

decrement
    : ID MINUS MINUS
    ;

funcStmt
    : FUNC ID funcParRet block
    ;

funcParRet
    : parameters result?
    ;
parameters 
    : PAR_OPEN (paramDcl (COMMA paramDcl)*)? PAR_CLOSE
    ;

paramDcl
    : idList type
    ;

result
    : type
    | PAR_OPEN type (COMMA type)* PAR_CLOSE
    ;

funcAccess
    : ID PAR_OPEN exprList? PAR_CLOSE # FuncCallExpr
    ;

type 
    : typesStatics          # TypePrimitive
    | MULT type             # TypePointer
    | arrayType             # TypeArrayDef
    ;

arrayType
    : CLASP_OPEN expression? CLASP_CLOSE type
    ;


exprList
    : expression (COMMA expression)*
    ;

expression
    : logicOr
    ;

logicOr
    : logicOr OR logicAnd    # OrExpr
    | logicAnd               # OrSimple
    ;

logicAnd
    : logicAnd AND expression_rational   # AndExpr
    | expression_rational                # AndSimple
    ;

expression_rational
    : expression_rational (EQUALITY | INEQUALITY | GREATER | LESS | GREATER_EQUAL | LESS_EQUAL ) expression_arithmetic # RatExpr
    | expression_arithmetic                 # RatSimple
    ;

expression_arithmetic
    : expression_arithmetic (PLUS | MINUS) term # AddSubExpr
    | term                                      # AddSubSimple
    ;

term
    : term (MULT | DIV | MOD) factor            # MultDivModExpr
    | factor                                    # TermSimple
    ;

factor
    : PAR_OPEN expression PAR_CLOSE      # ParExpr
    | PLUS factor                        # UnaryPlus
    | MINUS factor                       # UnaryMinus
    | AMPERSAND factor                   # ReferenceExpr
    | MULT factor                        # DefereceExpr
    | NOT factor                         # UnaryNot
    | literal                            # LiteralExpr  
    | NOW PAR_OPEN PAR_CLOSE                # NowExpr
    | SUBSTR PAR_OPEN exprList PAR_CLOSE    # SubstrExpr
    | TYPEOF PAR_OPEN expression PAR_CLOSE  # TypeOfExpr
    | LEN PAR_OPEN expression PAR_CLOSE     # LenStm 
    | funcAccess                         # CallExpr
    | arrayAccess                        # ArrayAccessExpr
    | ID                                 # IdExpr
    ;


literal
    : (INT | FLOAT | STRING | CHAR | TRUE | FALSE | NIL)
    | arrayLiteral
    ;
typesStatics
    : INT_R
    | FLOAT_R
    | BOOL_R
    | CHAR_R
    | STRING_R
    ;


// Lexer

OR: '||';
AND: '&&';
NOT: '!';
EQUAL: '=';
COLON_EQUAL: ':='; 
EQUALITY: '==';
INEQUALITY: '!=';
GREATER: '>';        
LESS: '<';
GREATER_EQUAL: '>=';
LESS_EQUAL: '<=';
PLUS: '+';
MINUS: '-';
MULT: '*';
DIV: '/';
MOD: '%';
TRUE: 'true';
FALSE: 'false';
INT_R: 'int' | 'int32';
FLOAT_R: 'float' | 'float32';
BOOL_R: 'bool' ;
CHAR_R: 'char' | 'rune';
STRING_R: 'string';
PAR_OPEN: '(' ;
PAR_CLOSE: ')';
COMMA: ',';
FMT_PRINT: 'fmt.Println' | 'println' ;
VAR: 'var';
CONST: 'const';
NIL: 'nil';
SEMICOLON: ';';
IF: 'if';
ELSE: 'else';
KEY_OPEN: '{';
KEY_CLOSE: '}';
CLASP_OPEN: '[';
CLASP_CLOSE: ']'; 
AMPERSAND: '&';


SWITCH: 'switch';
CASE: 'case';
COLON: ':';
DEFAULT: 'default';
FOR: 'for';
BREAK: 'break';
CONTINUE: 'continue';
RETURN: 'return';
ADD_ASSING: '+=';
SUB_ASSING: '-=';
MULT_ASSING: '*=';
DIV_ASSING: '/=';
MOD_ASSING: '%=';
FUNC: 'func';
LEN: 'len';
NOW: 'now';
SUBSTR: 'substr';
TYPEOF: 'typeOf';


STRING : '"' (~["\r\n] | '\\' .)* '"' ;
CHAR : '\'' (~['\\\r\n] | '\\' .) '\'' ;

ID  : [a-zA-Z_] [a-zA-Z0-9_]*;
INT : [0-9]+ ;
FLOAT 
    : [0-9]+ '.' [0-9]* ([eE] [+-]? [0-9]+)?
    | '.' [0-9]+ ([eE] [+-]? [0-9]+)?
    ;

WS  : [ \t\r\n]+ -> skip ;
LINE_COMMENT
    : '//' ~[\r\n]* -> skip ;
BLOCK_COMMENT
    : '/*' .*? '*/' -> skip ;

