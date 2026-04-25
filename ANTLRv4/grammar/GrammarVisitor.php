<?php

/*
 * Generated from grammar/Grammar.g4 by ANTLR 4.13.2
 */

use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;

/**
 * This interface defines a complete generic visitor for a parse tree produced by {@see GrammarParser}.
 */
interface GrammarVisitor extends ParseTreeVisitor
{
	/**
	 * Visit a parse tree produced by {@see GrammarParser::program()}.
	 *
	 * @param Context\ProgramContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitProgram(Context\ProgramContext $context);

	/**
	 * Visit a parse tree produced by the `DeclStmt` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\DeclStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDeclStmt(Context\DeclStmtContext $context);

	/**
	 * Visit a parse tree produced by the `AssignStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\AssignStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssignStm(Context\AssignStmContext $context);

	/**
	 * Visit a parse tree produced by the `PrintStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\PrintStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPrintStm(Context\PrintStmContext $context);

	/**
	 * Visit a parse tree produced by the `ConstStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\ConstStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConstStm(Context\ConstStmContext $context);

	/**
	 * Visit a parse tree produced by the `ifStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\IfStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfStm(Context\IfStmContext $context);

	/**
	 * Visit a parse tree produced by the `switchStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\SwitchStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchStm(Context\SwitchStmContext $context);

	/**
	 * Visit a parse tree produced by the `ForStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\ForStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForStm(Context\ForStmContext $context);

	/**
	 * Visit a parse tree produced by the `BreakStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\BreakStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreakStm(Context\BreakStmContext $context);

	/**
	 * Visit a parse tree produced by the `ContinueStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\ContinueStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinueStm(Context\ContinueStmContext $context);

	/**
	 * Visit a parse tree produced by the `ArrayAssingStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\ArrayAssingStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAssingStm(Context\ArrayAssingStmContext $context);

	/**
	 * Visit a parse tree produced by the `FunctionStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\FunctionStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFunctionStm(Context\FunctionStmContext $context);

	/**
	 * Visit a parse tree produced by the `ReturnStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\ReturnStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturnStm(Context\ReturnStmContext $context);

	/**
	 * Visit a parse tree produced by the `IncrementStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\IncrementStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIncrementStm(Context\IncrementStmContext $context);

	/**
	 * Visit a parse tree produced by the `DecrementStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\DecrementStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDecrementStm(Context\DecrementStmContext $context);

	/**
	 * Visit a parse tree produced by the `CallStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\CallStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallStm(Context\CallStmContext $context);

	/**
	 * Visit a parse tree produced by the `BlockStm` labeled alternative
	 * in {@see GrammarParser::statement()}.
	 *
	 * @param Context\BlockStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlockStm(Context\BlockStmContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::block()}.
	 *
	 * @param Context\BlockContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBlock(Context\BlockContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::printStmt()}.
	 *
	 * @param Context\PrintStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitPrintStmt(Context\PrintStmtContext $context);

	/**
	 * Visit a parse tree produced by the `VarDecl` labeled alternative
	 * in {@see GrammarParser::declareStmt()}.
	 *
	 * @param Context\VarDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitVarDecl(Context\VarDeclContext $context);

	/**
	 * Visit a parse tree produced by the `ShortDecl` labeled alternative
	 * in {@see GrammarParser::declareStmt()}.
	 *
	 * @param Context\ShortDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitShortDecl(Context\ShortDeclContext $context);

	/**
	 * Visit a parse tree produced by the `constDecl` labeled alternative
	 * in {@see GrammarParser::constStmt()}.
	 *
	 * @param Context\ConstDeclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitConstDecl(Context\ConstDeclContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::idList()}.
	 *
	 * @param Context\IdListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdList(Context\IdListContext $context);

	/**
	 * Visit a parse tree produced by the `Assingment` labeled alternative
	 * in {@see GrammarParser::assignStmt()}.
	 *
	 * @param Context\AssingmentContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssingment(Context\AssingmentContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::assingExp()}.
	 *
	 * @param Context\AssingExpContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAssingExp(Context\AssingExpContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::typeAssing()}.
	 *
	 * @param Context\TypeAssingContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeAssing(Context\TypeAssingContext $context);

	/**
	 * Visit a parse tree produced by the `IfDcl` labeled alternative
	 * in {@see GrammarParser::ifStmt()}.
	 *
	 * @param Context\IfDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIfDcl(Context\IfDclContext $context);

	/**
	 * Visit a parse tree produced by the `SwitchDcl` labeled alternative
	 * in {@see GrammarParser::switchStmt()}.
	 *
	 * @param Context\SwitchDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchDcl(Context\SwitchDclContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::switchCase()}.
	 *
	 * @param Context\SwitchCaseContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSwitchCase(Context\SwitchCaseContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::caseDefault()}.
	 *
	 * @param Context\CaseDefaultContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCaseDefault(Context\CaseDefaultContext $context);

	/**
	 * Visit a parse tree produced by the `ForDcl1` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 *
	 * @param Context\ForDcl1Context $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForDcl1(Context\ForDcl1Context $context);

	/**
	 * Visit a parse tree produced by the `ForDcl2` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 *
	 * @param Context\ForDcl2Context $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForDcl2(Context\ForDcl2Context $context);

	/**
	 * Visit a parse tree produced by the `ForDcl3` labeled alternative
	 * in {@see GrammarParser::forStmt()}.
	 *
	 * @param Context\ForDcl3Context $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForDcl3(Context\ForDcl3Context $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::for_init()}.
	 *
	 * @param Context\For_initContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFor_init(Context\For_initContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::break_stmt()}.
	 *
	 * @param Context\Break_stmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitBreak_stmt(Context\Break_stmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::continue_stmt()}.
	 *
	 * @param Context\Continue_stmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitContinue_stmt(Context\Continue_stmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::return_stmt()}.
	 *
	 * @param Context\Return_stmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReturn_stmt(Context\Return_stmtContext $context);

	/**
	 * Visit a parse tree produced by the `AsingArray` labeled alternative
	 * in {@see GrammarParser::arrayAssign()}.
	 *
	 * @param Context\AsingArrayContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAsingArray(Context\AsingArrayContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayDimension()}.
	 *
	 * @param Context\ArrayDimensionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayDimension(Context\ArrayDimensionContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayLiteral()}.
	 *
	 * @param Context\ArrayLiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayLiteral(Context\ArrayLiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayContent()}.
	 *
	 * @param Context\ArrayContentContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayContent(Context\ArrayContentContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayValues()}.
	 *
	 * @param Context\ArrayValuesContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayValues(Context\ArrayValuesContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayAccess()}.
	 *
	 * @param Context\ArrayAccessContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAccess(Context\ArrayAccessContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::forupdate()}.
	 *
	 * @param Context\ForupdateContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitForupdate(Context\ForupdateContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::increment()}.
	 *
	 * @param Context\IncrementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIncrement(Context\IncrementContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::decrement()}.
	 *
	 * @param Context\DecrementContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDecrement(Context\DecrementContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::funcStmt()}.
	 *
	 * @param Context\FuncStmtContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFuncStmt(Context\FuncStmtContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::funcParRet()}.
	 *
	 * @param Context\FuncParRetContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFuncParRet(Context\FuncParRetContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::parameters()}.
	 *
	 * @param Context\ParametersContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParameters(Context\ParametersContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::paramDcl()}.
	 *
	 * @param Context\ParamDclContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParamDcl(Context\ParamDclContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::result()}.
	 *
	 * @param Context\ResultContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitResult(Context\ResultContext $context);

	/**
	 * Visit a parse tree produced by the `FuncCallExpr` labeled alternative
	 * in {@see GrammarParser::funcAccess()}.
	 *
	 * @param Context\FuncCallExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitFuncCallExpr(Context\FuncCallExprContext $context);

	/**
	 * Visit a parse tree produced by the `TypePrimitive` labeled alternative
	 * in {@see GrammarParser::type()}.
	 *
	 * @param Context\TypePrimitiveContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypePrimitive(Context\TypePrimitiveContext $context);

	/**
	 * Visit a parse tree produced by the `TypePointer` labeled alternative
	 * in {@see GrammarParser::type()}.
	 *
	 * @param Context\TypePointerContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypePointer(Context\TypePointerContext $context);

	/**
	 * Visit a parse tree produced by the `TypeArrayDef` labeled alternative
	 * in {@see GrammarParser::type()}.
	 *
	 * @param Context\TypeArrayDefContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeArrayDef(Context\TypeArrayDefContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::arrayType()}.
	 *
	 * @param Context\ArrayTypeContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayType(Context\ArrayTypeContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::exprList()}.
	 *
	 * @param Context\ExprListContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExprList(Context\ExprListContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::expression()}.
	 *
	 * @param Context\ExpressionContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitExpression(Context\ExpressionContext $context);

	/**
	 * Visit a parse tree produced by the `OrSimple` labeled alternative
	 * in {@see GrammarParser::logicOr()}.
	 *
	 * @param Context\OrSimpleContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitOrSimple(Context\OrSimpleContext $context);

	/**
	 * Visit a parse tree produced by the `OrExpr` labeled alternative
	 * in {@see GrammarParser::logicOr()}.
	 *
	 * @param Context\OrExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitOrExpr(Context\OrExprContext $context);

	/**
	 * Visit a parse tree produced by the `AndExpr` labeled alternative
	 * in {@see GrammarParser::logicAnd()}.
	 *
	 * @param Context\AndExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAndExpr(Context\AndExprContext $context);

	/**
	 * Visit a parse tree produced by the `AndSimple` labeled alternative
	 * in {@see GrammarParser::logicAnd()}.
	 *
	 * @param Context\AndSimpleContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAndSimple(Context\AndSimpleContext $context);

	/**
	 * Visit a parse tree produced by the `RatExpr` labeled alternative
	 * in {@see GrammarParser::expression_rational()}.
	 *
	 * @param Context\RatExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRatExpr(Context\RatExprContext $context);

	/**
	 * Visit a parse tree produced by the `RatSimple` labeled alternative
	 * in {@see GrammarParser::expression_rational()}.
	 *
	 * @param Context\RatSimpleContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitRatSimple(Context\RatSimpleContext $context);

	/**
	 * Visit a parse tree produced by the `AddSubSimple` labeled alternative
	 * in {@see GrammarParser::expression_arithmetic()}.
	 *
	 * @param Context\AddSubSimpleContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAddSubSimple(Context\AddSubSimpleContext $context);

	/**
	 * Visit a parse tree produced by the `AddSubExpr` labeled alternative
	 * in {@see GrammarParser::expression_arithmetic()}.
	 *
	 * @param Context\AddSubExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitAddSubExpr(Context\AddSubExprContext $context);

	/**
	 * Visit a parse tree produced by the `MultDivModExpr` labeled alternative
	 * in {@see GrammarParser::term()}.
	 *
	 * @param Context\MultDivModExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitMultDivModExpr(Context\MultDivModExprContext $context);

	/**
	 * Visit a parse tree produced by the `TermSimple` labeled alternative
	 * in {@see GrammarParser::term()}.
	 *
	 * @param Context\TermSimpleContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTermSimple(Context\TermSimpleContext $context);

	/**
	 * Visit a parse tree produced by the `ParExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\ParExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitParExpr(Context\ParExprContext $context);

	/**
	 * Visit a parse tree produced by the `UnaryPlus` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\UnaryPlusContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryPlus(Context\UnaryPlusContext $context);

	/**
	 * Visit a parse tree produced by the `UnaryMinus` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\UnaryMinusContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryMinus(Context\UnaryMinusContext $context);

	/**
	 * Visit a parse tree produced by the `ReferenceExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\ReferenceExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitReferenceExpr(Context\ReferenceExprContext $context);

	/**
	 * Visit a parse tree produced by the `DefereceExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\DefereceExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitDefereceExpr(Context\DefereceExprContext $context);

	/**
	 * Visit a parse tree produced by the `UnaryNot` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\UnaryNotContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitUnaryNot(Context\UnaryNotContext $context);

	/**
	 * Visit a parse tree produced by the `LiteralExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\LiteralExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLiteralExpr(Context\LiteralExprContext $context);

	/**
	 * Visit a parse tree produced by the `NowExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\NowExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitNowExpr(Context\NowExprContext $context);

	/**
	 * Visit a parse tree produced by the `SubstrExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\SubstrExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitSubstrExpr(Context\SubstrExprContext $context);

	/**
	 * Visit a parse tree produced by the `TypeOfExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\TypeOfExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypeOfExpr(Context\TypeOfExprContext $context);

	/**
	 * Visit a parse tree produced by the `LenStm` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\LenStmContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLenStm(Context\LenStmContext $context);

	/**
	 * Visit a parse tree produced by the `CallExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\CallExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitCallExpr(Context\CallExprContext $context);

	/**
	 * Visit a parse tree produced by the `ArrayAccessExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\ArrayAccessExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitArrayAccessExpr(Context\ArrayAccessExprContext $context);

	/**
	 * Visit a parse tree produced by the `IdExpr` labeled alternative
	 * in {@see GrammarParser::factor()}.
	 *
	 * @param Context\IdExprContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitIdExpr(Context\IdExprContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::literal()}.
	 *
	 * @param Context\LiteralContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitLiteral(Context\LiteralContext $context);

	/**
	 * Visit a parse tree produced by {@see GrammarParser::typesStatics()}.
	 *
	 * @param Context\TypesStaticsContext $context The parse tree.
	 *
	 * @return mixed The visitor result.
	 */
	public function visitTypesStatics(Context\TypesStaticsContext $context);
}