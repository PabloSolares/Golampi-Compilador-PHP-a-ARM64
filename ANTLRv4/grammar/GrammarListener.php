<?php

/*
 * Generated from grammar/Grammar.g4 by ANTLR 4.13.2
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;

/**
 * This interface defines a complete listener for a parse tree produced by
 * {@see GrammarParser}.
 */
interface GrammarListener extends ParseTreeListener {
	/**
	 * Enter a parse tree produced by {@see GrammarParser::program()}.
	 * @param $context The parse tree.
	 */
	public function enterProgram(Context\ProgramContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::program()}.
	 * @param $context The parse tree.
	 */
	public function exitProgram(Context\ProgramContext $context): void;
	/**
	 * Enter a parse tree produced by the `DeclStmt`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterDeclStmt(Context\DeclStmtContext $context): void;
	/**
	 * Exit a parse tree produced by the `DeclStmt` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitDeclStmt(Context\DeclStmtContext $context): void;
	/**
	 * Enter a parse tree produced by the `AssignStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterAssignStm(Context\AssignStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `AssignStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitAssignStm(Context\AssignStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `PrintStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterPrintStm(Context\PrintStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `PrintStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitPrintStm(Context\PrintStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ConstStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterConstStm(Context\ConstStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ConstStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitConstStm(Context\ConstStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ifStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterIfStm(Context\IfStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ifStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitIfStm(Context\IfStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `switchStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchStm(Context\SwitchStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `switchStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchStm(Context\SwitchStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterForStm(Context\ForStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ForStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitForStm(Context\ForStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `BreakStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterBreakStm(Context\BreakStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `BreakStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitBreakStm(Context\BreakStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ContinueStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterContinueStm(Context\ContinueStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ContinueStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitContinueStm(Context\ContinueStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArrayAssingStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayAssingStm(Context\ArrayAssingStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArrayAssingStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayAssingStm(Context\ArrayAssingStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `FunctionStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterFunctionStm(Context\FunctionStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `FunctionStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitFunctionStm(Context\FunctionStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `ReturnStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterReturnStm(Context\ReturnStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `ReturnStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitReturnStm(Context\ReturnStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `IncrementStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterIncrementStm(Context\IncrementStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `IncrementStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitIncrementStm(Context\IncrementStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `DecrementStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterDecrementStm(Context\DecrementStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `DecrementStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitDecrementStm(Context\DecrementStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `CallStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterCallStm(Context\CallStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `CallStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitCallStm(Context\CallStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `BlockStm`
	 * labeled alternative in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function enterBlockStm(Context\BlockStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `BlockStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 * @param $context The parse tree.
	 */
	public function exitBlockStm(Context\BlockStmContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::block()}.
	 * @param $context The parse tree.
	 */
	public function enterBlock(Context\BlockContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::block()}.
	 * @param $context The parse tree.
	 */
	public function exitBlock(Context\BlockContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::printStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterPrintStmt(Context\PrintStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::printStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitPrintStmt(Context\PrintStmtContext $context): void;
	/**
	 * Enter a parse tree produced by the `VarDecl`
	 * labeled alternative in {@see GrammarParser::declareStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Exit a parse tree produced by the `VarDecl` labeled alternative
	 * in {@see GrammarParser::declareStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitVarDecl(Context\VarDeclContext $context): void;
	/**
	 * Enter a parse tree produced by the `ShortDecl`
	 * labeled alternative in {@see GrammarParser::declareStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterShortDecl(Context\ShortDeclContext $context): void;
	/**
	 * Exit a parse tree produced by the `ShortDecl` labeled alternative
	 * in {@see GrammarParser::declareStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitShortDecl(Context\ShortDeclContext $context): void;
	/**
	 * Enter a parse tree produced by the `constDecl`
	 * labeled alternative in {@see GrammarParser::constStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Exit a parse tree produced by the `constDecl` labeled alternative
	 * in {@see GrammarParser::constStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitConstDecl(Context\ConstDeclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function enterIdList(Context\IdListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::idList()}.
	 * @param $context The parse tree.
	 */
	public function exitIdList(Context\IdListContext $context): void;
	/**
	 * Enter a parse tree produced by the `Assingment`
	 * labeled alternative in {@see GrammarParser::assignStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterAssingment(Context\AssingmentContext $context): void;
	/**
	 * Exit a parse tree produced by the `Assingment` labeled alternative
	 * in {@see GrammarParser::assignStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitAssingment(Context\AssingmentContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::assingExp()}.
	 * @param $context The parse tree.
	 */
	public function enterAssingExp(Context\AssingExpContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::assingExp()}.
	 * @param $context The parse tree.
	 */
	public function exitAssingExp(Context\AssingExpContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::typeAssing()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeAssing(Context\TypeAssingContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::typeAssing()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeAssing(Context\TypeAssingContext $context): void;
	/**
	 * Enter a parse tree produced by the `IfDcl`
	 * labeled alternative in {@see GrammarParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterIfDcl(Context\IfDclContext $context): void;
	/**
	 * Exit a parse tree produced by the `IfDcl` labeled alternative
	 * in {@see GrammarParser::ifStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitIfDcl(Context\IfDclContext $context): void;
	/**
	 * Enter a parse tree produced by the `SwitchDcl`
	 * labeled alternative in {@see GrammarParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchDcl(Context\SwitchDclContext $context): void;
	/**
	 * Exit a parse tree produced by the `SwitchDcl` labeled alternative
	 * in {@see GrammarParser::switchStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchDcl(Context\SwitchDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function enterSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::switchCase()}.
	 * @param $context The parse tree.
	 */
	public function exitSwitchCase(Context\SwitchCaseContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::caseDefault()}.
	 * @param $context The parse tree.
	 */
	public function enterCaseDefault(Context\CaseDefaultContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::caseDefault()}.
	 * @param $context The parse tree.
	 */
	public function exitCaseDefault(Context\CaseDefaultContext $context): void;
	/**
	 * Enter a parse tree produced by the `ForDcl1`
	 * labeled alternative in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForDcl1(Context\ForDcl1Context $context): void;
	/**
	 * Exit a parse tree produced by the `ForDcl1` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForDcl1(Context\ForDcl1Context $context): void;
	/**
	 * Enter a parse tree produced by the `ForDcl2`
	 * labeled alternative in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForDcl2(Context\ForDcl2Context $context): void;
	/**
	 * Exit a parse tree produced by the `ForDcl2` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForDcl2(Context\ForDcl2Context $context): void;
	/**
	 * Enter a parse tree produced by the `ForDcl3`
	 * labeled alternative in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterForDcl3(Context\ForDcl3Context $context): void;
	/**
	 * Exit a parse tree produced by the `ForDcl3` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitForDcl3(Context\ForDcl3Context $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::for_init()}.
	 * @param $context The parse tree.
	 */
	public function enterFor_init(Context\For_initContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::for_init()}.
	 * @param $context The parse tree.
	 */
	public function exitFor_init(Context\For_initContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::break_stmt()}.
	 * @param $context The parse tree.
	 */
	public function enterBreak_stmt(Context\Break_stmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::break_stmt()}.
	 * @param $context The parse tree.
	 */
	public function exitBreak_stmt(Context\Break_stmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::continue_stmt()}.
	 * @param $context The parse tree.
	 */
	public function enterContinue_stmt(Context\Continue_stmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::continue_stmt()}.
	 * @param $context The parse tree.
	 */
	public function exitContinue_stmt(Context\Continue_stmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::return_stmt()}.
	 * @param $context The parse tree.
	 */
	public function enterReturn_stmt(Context\Return_stmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::return_stmt()}.
	 * @param $context The parse tree.
	 */
	public function exitReturn_stmt(Context\Return_stmtContext $context): void;
	/**
	 * Enter a parse tree produced by the `AsingArray`
	 * labeled alternative in {@see GrammarParser::arrayAssign()}.
	 * @param $context The parse tree.
	 */
	public function enterAsingArray(Context\AsingArrayContext $context): void;
	/**
	 * Exit a parse tree produced by the `AsingArray` labeled alternative
	 * in {@see GrammarParser::arrayAssign()}.
	 * @param $context The parse tree.
	 */
	public function exitAsingArray(Context\AsingArrayContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayDimension()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayDimension(Context\ArrayDimensionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayDimension()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayDimension(Context\ArrayDimensionContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayLiteral()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayLiteral(Context\ArrayLiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayContent()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayContent(Context\ArrayContentContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayContent()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayContent(Context\ArrayContentContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayValues()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayValues(Context\ArrayValuesContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayValues()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayValues(Context\ArrayValuesContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayAccess()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayAccess(Context\ArrayAccessContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayAccess()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayAccess(Context\ArrayAccessContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::forupdate()}.
	 * @param $context The parse tree.
	 */
	public function enterForupdate(Context\ForupdateContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::forupdate()}.
	 * @param $context The parse tree.
	 */
	public function exitForupdate(Context\ForupdateContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::increment()}.
	 * @param $context The parse tree.
	 */
	public function enterIncrement(Context\IncrementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::increment()}.
	 * @param $context The parse tree.
	 */
	public function exitIncrement(Context\IncrementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::decrement()}.
	 * @param $context The parse tree.
	 */
	public function enterDecrement(Context\DecrementContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::decrement()}.
	 * @param $context The parse tree.
	 */
	public function exitDecrement(Context\DecrementContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcStmt()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncStmt(Context\FuncStmtContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcStmt()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncStmt(Context\FuncStmtContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::funcParRet()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncParRet(Context\FuncParRetContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::funcParRet()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncParRet(Context\FuncParRetContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::parameters()}.
	 * @param $context The parse tree.
	 */
	public function enterParameters(Context\ParametersContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::parameters()}.
	 * @param $context The parse tree.
	 */
	public function exitParameters(Context\ParametersContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::paramDcl()}.
	 * @param $context The parse tree.
	 */
	public function enterParamDcl(Context\ParamDclContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::paramDcl()}.
	 * @param $context The parse tree.
	 */
	public function exitParamDcl(Context\ParamDclContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::result()}.
	 * @param $context The parse tree.
	 */
	public function enterResult(Context\ResultContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::result()}.
	 * @param $context The parse tree.
	 */
	public function exitResult(Context\ResultContext $context): void;
	/**
	 * Enter a parse tree produced by the `FuncCallExpr`
	 * labeled alternative in {@see GrammarParser::funcAccess()}.
	 * @param $context The parse tree.
	 */
	public function enterFuncCallExpr(Context\FuncCallExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `FuncCallExpr` labeled alternative
	 * in {@see GrammarParser::funcAccess()}.
	 * @param $context The parse tree.
	 */
	public function exitFuncCallExpr(Context\FuncCallExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypePrimitive`
	 * labeled alternative in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterTypePrimitive(Context\TypePrimitiveContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypePrimitive` labeled alternative
	 * in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitTypePrimitive(Context\TypePrimitiveContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypePointer`
	 * labeled alternative in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterTypePointer(Context\TypePointerContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypePointer` labeled alternative
	 * in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitTypePointer(Context\TypePointerContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypeArrayDef`
	 * labeled alternative in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeArrayDef(Context\TypeArrayDefContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypeArrayDef` labeled alternative
	 * in {@see GrammarParser::type()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeArrayDef(Context\TypeArrayDefContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::arrayType()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayType(Context\ArrayTypeContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::exprList()}.
	 * @param $context The parse tree.
	 */
	public function enterExprList(Context\ExprListContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::exprList()}.
	 * @param $context The parse tree.
	 */
	public function exitExprList(Context\ExprListContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function enterExpression(Context\ExpressionContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::expression()}.
	 * @param $context The parse tree.
	 */
	public function exitExpression(Context\ExpressionContext $context): void;
	/**
	 * Enter a parse tree produced by the `OrSimple`
	 * labeled alternative in {@see GrammarParser::logicOr()}.
	 * @param $context The parse tree.
	 */
	public function enterOrSimple(Context\OrSimpleContext $context): void;
	/**
	 * Exit a parse tree produced by the `OrSimple` labeled alternative
	 * in {@see GrammarParser::logicOr()}.
	 * @param $context The parse tree.
	 */
	public function exitOrSimple(Context\OrSimpleContext $context): void;
	/**
	 * Enter a parse tree produced by the `OrExpr`
	 * labeled alternative in {@see GrammarParser::logicOr()}.
	 * @param $context The parse tree.
	 */
	public function enterOrExpr(Context\OrExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `OrExpr` labeled alternative
	 * in {@see GrammarParser::logicOr()}.
	 * @param $context The parse tree.
	 */
	public function exitOrExpr(Context\OrExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `AndExpr`
	 * labeled alternative in {@see GrammarParser::logicAnd()}.
	 * @param $context The parse tree.
	 */
	public function enterAndExpr(Context\AndExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `AndExpr` labeled alternative
	 * in {@see GrammarParser::logicAnd()}.
	 * @param $context The parse tree.
	 */
	public function exitAndExpr(Context\AndExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `AndSimple`
	 * labeled alternative in {@see GrammarParser::logicAnd()}.
	 * @param $context The parse tree.
	 */
	public function enterAndSimple(Context\AndSimpleContext $context): void;
	/**
	 * Exit a parse tree produced by the `AndSimple` labeled alternative
	 * in {@see GrammarParser::logicAnd()}.
	 * @param $context The parse tree.
	 */
	public function exitAndSimple(Context\AndSimpleContext $context): void;
	/**
	 * Enter a parse tree produced by the `RatExpr`
	 * labeled alternative in {@see GrammarParser::expression_rational()}.
	 * @param $context The parse tree.
	 */
	public function enterRatExpr(Context\RatExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `RatExpr` labeled alternative
	 * in {@see GrammarParser::expression_rational()}.
	 * @param $context The parse tree.
	 */
	public function exitRatExpr(Context\RatExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `RatSimple`
	 * labeled alternative in {@see GrammarParser::expression_rational()}.
	 * @param $context The parse tree.
	 */
	public function enterRatSimple(Context\RatSimpleContext $context): void;
	/**
	 * Exit a parse tree produced by the `RatSimple` labeled alternative
	 * in {@see GrammarParser::expression_rational()}.
	 * @param $context The parse tree.
	 */
	public function exitRatSimple(Context\RatSimpleContext $context): void;
	/**
	 * Enter a parse tree produced by the `AddSubSimple`
	 * labeled alternative in {@see GrammarParser::expression_arithmetic()}.
	 * @param $context The parse tree.
	 */
	public function enterAddSubSimple(Context\AddSubSimpleContext $context): void;
	/**
	 * Exit a parse tree produced by the `AddSubSimple` labeled alternative
	 * in {@see GrammarParser::expression_arithmetic()}.
	 * @param $context The parse tree.
	 */
	public function exitAddSubSimple(Context\AddSubSimpleContext $context): void;
	/**
	 * Enter a parse tree produced by the `AddSubExpr`
	 * labeled alternative in {@see GrammarParser::expression_arithmetic()}.
	 * @param $context The parse tree.
	 */
	public function enterAddSubExpr(Context\AddSubExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `AddSubExpr` labeled alternative
	 * in {@see GrammarParser::expression_arithmetic()}.
	 * @param $context The parse tree.
	 */
	public function exitAddSubExpr(Context\AddSubExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `MultDivModExpr`
	 * labeled alternative in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function enterMultDivModExpr(Context\MultDivModExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `MultDivModExpr` labeled alternative
	 * in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function exitMultDivModExpr(Context\MultDivModExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `TermSimple`
	 * labeled alternative in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function enterTermSimple(Context\TermSimpleContext $context): void;
	/**
	 * Exit a parse tree produced by the `TermSimple` labeled alternative
	 * in {@see GrammarParser::term()}.
	 * @param $context The parse tree.
	 */
	public function exitTermSimple(Context\TermSimpleContext $context): void;
	/**
	 * Enter a parse tree produced by the `ParExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterParExpr(Context\ParExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ParExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitParExpr(Context\ParExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `UnaryPlus`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryPlus(Context\UnaryPlusContext $context): void;
	/**
	 * Exit a parse tree produced by the `UnaryPlus` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryPlus(Context\UnaryPlusContext $context): void;
	/**
	 * Enter a parse tree produced by the `UnaryMinus`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryMinus(Context\UnaryMinusContext $context): void;
	/**
	 * Exit a parse tree produced by the `UnaryMinus` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryMinus(Context\UnaryMinusContext $context): void;
	/**
	 * Enter a parse tree produced by the `ReferenceExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterReferenceExpr(Context\ReferenceExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ReferenceExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitReferenceExpr(Context\ReferenceExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `DefereceExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterDefereceExpr(Context\DefereceExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `DefereceExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitDefereceExpr(Context\DefereceExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `UnaryNot`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterUnaryNot(Context\UnaryNotContext $context): void;
	/**
	 * Exit a parse tree produced by the `UnaryNot` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitUnaryNot(Context\UnaryNotContext $context): void;
	/**
	 * Enter a parse tree produced by the `LiteralExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterLiteralExpr(Context\LiteralExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `LiteralExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitLiteralExpr(Context\LiteralExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `NowExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterNowExpr(Context\NowExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `NowExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitNowExpr(Context\NowExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `SubstrExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterSubstrExpr(Context\SubstrExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `SubstrExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitSubstrExpr(Context\SubstrExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `TypeOfExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterTypeOfExpr(Context\TypeOfExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `TypeOfExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitTypeOfExpr(Context\TypeOfExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `LenStm`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterLenStm(Context\LenStmContext $context): void;
	/**
	 * Exit a parse tree produced by the `LenStm` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitLenStm(Context\LenStmContext $context): void;
	/**
	 * Enter a parse tree produced by the `CallExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterCallExpr(Context\CallExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `CallExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitCallExpr(Context\CallExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `ArrayAccessExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterArrayAccessExpr(Context\ArrayAccessExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `ArrayAccessExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitArrayAccessExpr(Context\ArrayAccessExprContext $context): void;
	/**
	 * Enter a parse tree produced by the `IdExpr`
	 * labeled alternative in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function enterIdExpr(Context\IdExprContext $context): void;
	/**
	 * Exit a parse tree produced by the `IdExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 * @param $context The parse tree.
	 */
	public function exitIdExpr(Context\IdExprContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function enterLiteral(Context\LiteralContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::literal()}.
	 * @param $context The parse tree.
	 */
	public function exitLiteral(Context\LiteralContext $context): void;
	/**
	 * Enter a parse tree produced by {@see GrammarParser::typesStatics()}.
	 * @param $context The parse tree.
	 */
	public function enterTypesStatics(Context\TypesStaticsContext $context): void;
	/**
	 * Exit a parse tree produced by {@see GrammarParser::typesStatics()}.
	 * @param $context The parse tree.
	 */
	public function exitTypesStatics(Context\TypesStaticsContext $context): void;
}