<?php

/*
 * Generated from grammar/Grammar.g4 by ANTLR 4.13.2
 */

namespace {
	use Antlr\Antlr4\Runtime\Atn\ATN;
	use Antlr\Antlr4\Runtime\Atn\ATNDeserializer;
	use Antlr\Antlr4\Runtime\Atn\ParserATNSimulator;
	use Antlr\Antlr4\Runtime\Dfa\DFA;
	use Antlr\Antlr4\Runtime\Error\Exceptions\FailedPredicateException;
	use Antlr\Antlr4\Runtime\Error\Exceptions\NoViableAltException;
	use Antlr\Antlr4\Runtime\PredictionContexts\PredictionContextCache;
	use Antlr\Antlr4\Runtime\Error\Exceptions\RecognitionException;
	use Antlr\Antlr4\Runtime\RuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\TokenStream;
	use Antlr\Antlr4\Runtime\Vocabulary;
	use Antlr\Antlr4\Runtime\VocabularyImpl;
	use Antlr\Antlr4\Runtime\RuntimeMetaData;
	use Antlr\Antlr4\Runtime\Parser;

	final class GrammarParser extends Parser
	{
		public const OR = 1, AND = 2, NOT = 3, EQUAL = 4, COLON_EQUAL = 5, EQUALITY = 6, 
               INEQUALITY = 7, GREATER = 8, LESS = 9, GREATER_EQUAL = 10, 
               LESS_EQUAL = 11, PLUS = 12, MINUS = 13, MULT = 14, DIV = 15, 
               MOD = 16, TRUE = 17, FALSE = 18, INT_R = 19, FLOAT_R = 20, 
               BOOL_R = 21, CHAR_R = 22, STRING_R = 23, PAR_OPEN = 24, PAR_CLOSE = 25, 
               COMMA = 26, FMT_PRINT = 27, VAR = 28, CONST = 29, NIL = 30, 
               SEMICOLON = 31, IF = 32, ELSE = 33, KEY_OPEN = 34, KEY_CLOSE = 35, 
               CLASP_OPEN = 36, CLASP_CLOSE = 37, AMPERSAND = 38, SWITCH = 39, 
               CASE = 40, COLON = 41, DEFAULT = 42, FOR = 43, BREAK = 44, 
               CONTINUE = 45, RETURN = 46, ADD_ASSING = 47, SUB_ASSING = 48, 
               MULT_ASSING = 49, DIV_ASSING = 50, MOD_ASSING = 51, FUNC = 52, 
               LEN = 53, NOW = 54, SUBSTR = 55, TYPEOF = 56, STRING = 57, 
               CHAR = 58, ID = 59, INT = 60, FLOAT = 61, WS = 62, LINE_COMMENT = 63, 
               BLOCK_COMMENT = 64;

		public const RULE_program = 0, RULE_statement = 1, RULE_block = 2, RULE_printStmt = 3, 
               RULE_declareStmt = 4, RULE_constStmt = 5, RULE_idList = 6, 
               RULE_assignStmt = 7, RULE_assingExp = 8, RULE_typeAssing = 9, 
               RULE_ifStmt = 10, RULE_switchStmt = 11, RULE_switchCase = 12, 
               RULE_caseDefault = 13, RULE_forStmt = 14, RULE_for_init = 15, 
               RULE_break_stmt = 16, RULE_continue_stmt = 17, RULE_return_stmt = 18, 
               RULE_arrayAssign = 19, RULE_arrayDimension = 20, RULE_arrayLiteral = 21, 
               RULE_arrayContent = 22, RULE_arrayValues = 23, RULE_arrayAccess = 24, 
               RULE_forupdate = 25, RULE_increment = 26, RULE_decrement = 27, 
               RULE_funcStmt = 28, RULE_funcParRet = 29, RULE_parameters = 30, 
               RULE_paramDcl = 31, RULE_result = 32, RULE_funcAccess = 33, 
               RULE_type = 34, RULE_arrayType = 35, RULE_exprList = 36, 
               RULE_expression = 37, RULE_logicOr = 38, RULE_logicAnd = 39, 
               RULE_expression_rational = 40, RULE_expression_arithmetic = 41, 
               RULE_term = 42, RULE_factor = 43, RULE_literal = 44, RULE_typesStatics = 45;

		/**
		 * @var array<string>
		 */
		public const RULE_NAMES = [
			'program', 'statement', 'block', 'printStmt', 'declareStmt', 'constStmt', 
			'idList', 'assignStmt', 'assingExp', 'typeAssing', 'ifStmt', 'switchStmt', 
			'switchCase', 'caseDefault', 'forStmt', 'for_init', 'break_stmt', 'continue_stmt', 
			'return_stmt', 'arrayAssign', 'arrayDimension', 'arrayLiteral', 'arrayContent', 
			'arrayValues', 'arrayAccess', 'forupdate', 'increment', 'decrement', 
			'funcStmt', 'funcParRet', 'parameters', 'paramDcl', 'result', 'funcAccess', 
			'type', 'arrayType', 'exprList', 'expression', 'logicOr', 'logicAnd', 
			'expression_rational', 'expression_arithmetic', 'term', 'factor', 'literal', 
			'typesStatics'
		];

		/**
		 * @var array<string|null>
		 */
		private const LITERAL_NAMES = [
		    null, "'||'", "'&&'", "'!'", "'='", "':='", "'=='", "'!='", "'>'", 
		    "'<'", "'>='", "'<='", "'+'", "'-'", "'*'", "'/'", "'%'", "'true'", 
		    "'false'", null, null, "'bool'", null, "'string'", "'('", "')'", "','", 
		    null, "'var'", "'const'", "'nil'", "';'", "'if'", "'else'", "'{'", 
		    "'}'", "'['", "']'", "'&'", "'switch'", "'case'", "':'", "'default'", 
		    "'for'", "'break'", "'continue'", "'return'", "'+='", "'-='", "'*='", 
		    "'/='", "'%='", "'func'", "'len'", "'now'", "'substr'", "'typeOf'"
		];

		/**
		 * @var array<string>
		 */
		private const SYMBOLIC_NAMES = [
		    null, "OR", "AND", "NOT", "EQUAL", "COLON_EQUAL", "EQUALITY", "INEQUALITY", 
		    "GREATER", "LESS", "GREATER_EQUAL", "LESS_EQUAL", "PLUS", "MINUS", 
		    "MULT", "DIV", "MOD", "TRUE", "FALSE", "INT_R", "FLOAT_R", "BOOL_R", 
		    "CHAR_R", "STRING_R", "PAR_OPEN", "PAR_CLOSE", "COMMA", "FMT_PRINT", 
		    "VAR", "CONST", "NIL", "SEMICOLON", "IF", "ELSE", "KEY_OPEN", "KEY_CLOSE", 
		    "CLASP_OPEN", "CLASP_CLOSE", "AMPERSAND", "SWITCH", "CASE", "COLON", 
		    "DEFAULT", "FOR", "BREAK", "CONTINUE", "RETURN", "ADD_ASSING", "SUB_ASSING", 
		    "MULT_ASSING", "DIV_ASSING", "MOD_ASSING", "FUNC", "LEN", "NOW", "SUBSTR", 
		    "TYPEOF", "STRING", "CHAR", "ID", "INT", "FLOAT", "WS", "LINE_COMMENT", 
		    "BLOCK_COMMENT"
		];

		private const SERIALIZED_ATN =
			[4, 1, 64, 501, 2, 0, 7, 0, 2, 1, 7, 1, 2, 2, 7, 2, 2, 3, 7, 3, 2, 4, 
		    7, 4, 2, 5, 7, 5, 2, 6, 7, 6, 2, 7, 7, 7, 2, 8, 7, 8, 2, 9, 7, 9, 
		    2, 10, 7, 10, 2, 11, 7, 11, 2, 12, 7, 12, 2, 13, 7, 13, 2, 14, 7, 
		    14, 2, 15, 7, 15, 2, 16, 7, 16, 2, 17, 7, 17, 2, 18, 7, 18, 2, 19, 
		    7, 19, 2, 20, 7, 20, 2, 21, 7, 21, 2, 22, 7, 22, 2, 23, 7, 23, 2, 
		    24, 7, 24, 2, 25, 7, 25, 2, 26, 7, 26, 2, 27, 7, 27, 2, 28, 7, 28, 
		    2, 29, 7, 29, 2, 30, 7, 30, 2, 31, 7, 31, 2, 32, 7, 32, 2, 33, 7, 
		    33, 2, 34, 7, 34, 2, 35, 7, 35, 2, 36, 7, 36, 2, 37, 7, 37, 2, 38, 
		    7, 38, 2, 39, 7, 39, 2, 40, 7, 40, 2, 41, 7, 41, 2, 42, 7, 42, 2, 
		    43, 7, 43, 2, 44, 7, 44, 2, 45, 7, 45, 1, 0, 4, 0, 94, 8, 0, 11, 0, 
		    12, 0, 95, 1, 0, 1, 0, 1, 1, 1, 1, 3, 1, 102, 8, 1, 1, 1, 1, 1, 3, 
		    1, 106, 8, 1, 1, 1, 1, 1, 3, 1, 110, 8, 1, 1, 1, 1, 1, 3, 1, 114, 
		    8, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 
		    3, 1, 126, 8, 1, 1, 1, 1, 1, 3, 1, 130, 8, 1, 1, 1, 1, 1, 3, 1, 134, 
		    8, 1, 1, 1, 3, 1, 137, 8, 1, 1, 2, 1, 2, 5, 2, 141, 8, 2, 10, 2, 12, 
		    2, 144, 9, 2, 1, 2, 1, 2, 1, 3, 1, 3, 1, 3, 3, 3, 151, 8, 3, 1, 3, 
		    1, 3, 1, 4, 1, 4, 1, 4, 1, 4, 1, 4, 3, 4, 160, 8, 4, 1, 4, 1, 4, 1, 
		    4, 1, 4, 3, 4, 166, 8, 4, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 5, 1, 6, 
		    1, 6, 1, 6, 5, 6, 177, 8, 6, 10, 6, 12, 6, 180, 9, 6, 1, 7, 1, 7, 
		    1, 7, 1, 7, 1, 8, 1, 8, 1, 8, 1, 8, 3, 8, 190, 8, 8, 1, 9, 1, 9, 1, 
		    10, 1, 10, 1, 10, 1, 10, 3, 10, 198, 8, 10, 1, 10, 1, 10, 1, 10, 1, 
		    10, 3, 10, 204, 8, 10, 1, 11, 1, 11, 1, 11, 1, 11, 5, 11, 210, 8, 
		    11, 10, 11, 12, 11, 213, 9, 11, 1, 11, 3, 11, 216, 8, 11, 1, 11, 1, 
		    11, 1, 12, 1, 12, 1, 12, 1, 12, 5, 12, 224, 8, 12, 10, 12, 12, 12, 
		    227, 9, 12, 1, 13, 1, 13, 1, 13, 5, 13, 232, 8, 13, 10, 13, 12, 13, 
		    235, 9, 13, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 
		    1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 1, 14, 3, 14, 251, 8, 14, 1, 15, 
		    1, 15, 3, 15, 255, 8, 15, 1, 16, 1, 16, 3, 16, 259, 8, 16, 1, 17, 
		    1, 17, 3, 17, 263, 8, 17, 1, 18, 1, 18, 3, 18, 267, 8, 18, 1, 18, 
		    3, 18, 270, 8, 18, 1, 19, 1, 19, 1, 19, 1, 19, 1, 19, 3, 19, 277, 
		    8, 19, 1, 20, 1, 20, 1, 20, 1, 20, 4, 20, 283, 8, 20, 11, 20, 12, 
		    20, 284, 1, 21, 1, 21, 1, 21, 1, 22, 1, 22, 1, 22, 3, 22, 293, 8, 
		    22, 1, 22, 1, 22, 1, 23, 1, 23, 3, 23, 299, 8, 23, 1, 23, 1, 23, 1, 
		    23, 3, 23, 304, 8, 23, 5, 23, 306, 8, 23, 10, 23, 12, 23, 309, 9, 
		    23, 1, 24, 1, 24, 1, 24, 1, 24, 1, 24, 4, 24, 316, 8, 24, 11, 24, 
		    12, 24, 317, 1, 25, 1, 25, 1, 25, 3, 25, 323, 8, 25, 1, 26, 1, 26, 
		    1, 26, 1, 26, 1, 27, 1, 27, 1, 27, 1, 27, 1, 28, 1, 28, 1, 28, 1, 
		    28, 1, 28, 1, 29, 1, 29, 3, 29, 340, 8, 29, 1, 30, 1, 30, 1, 30, 1, 
		    30, 5, 30, 346, 8, 30, 10, 30, 12, 30, 349, 9, 30, 3, 30, 351, 8, 
		    30, 1, 30, 1, 30, 1, 31, 1, 31, 1, 31, 1, 32, 1, 32, 1, 32, 1, 32, 
		    1, 32, 5, 32, 363, 8, 32, 10, 32, 12, 32, 366, 9, 32, 1, 32, 1, 32, 
		    3, 32, 370, 8, 32, 1, 33, 1, 33, 1, 33, 3, 33, 375, 8, 33, 1, 33, 
		    1, 33, 1, 34, 1, 34, 1, 34, 1, 34, 3, 34, 383, 8, 34, 1, 35, 1, 35, 
		    3, 35, 387, 8, 35, 1, 35, 1, 35, 1, 35, 1, 36, 1, 36, 1, 36, 5, 36, 
		    395, 8, 36, 10, 36, 12, 36, 398, 9, 36, 1, 37, 1, 37, 1, 38, 1, 38, 
		    1, 38, 1, 38, 1, 38, 1, 38, 5, 38, 408, 8, 38, 10, 38, 12, 38, 411, 
		    9, 38, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 1, 39, 5, 39, 419, 8, 39, 
		    10, 39, 12, 39, 422, 9, 39, 1, 40, 1, 40, 1, 40, 1, 40, 1, 40, 1, 
		    40, 5, 40, 430, 8, 40, 10, 40, 12, 40, 433, 9, 40, 1, 41, 1, 41, 1, 
		    41, 1, 41, 1, 41, 1, 41, 5, 41, 441, 8, 41, 10, 41, 12, 41, 444, 9, 
		    41, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 1, 42, 5, 42, 452, 8, 42, 10, 
		    42, 12, 42, 455, 9, 42, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 
		    1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 
		    43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 
		    1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 43, 1, 
		    43, 1, 43, 3, 43, 493, 8, 43, 1, 44, 1, 44, 3, 44, 497, 8, 44, 1, 
		    45, 1, 45, 1, 45, 0, 5, 76, 78, 80, 82, 84, 46, 0, 2, 4, 6, 8, 10, 
		    12, 14, 16, 18, 20, 22, 24, 26, 28, 30, 32, 34, 36, 38, 40, 42, 44, 
		    46, 48, 50, 52, 54, 56, 58, 60, 62, 64, 66, 68, 70, 72, 74, 76, 78, 
		    80, 82, 84, 86, 88, 90, 0, 6, 2, 0, 4, 4, 47, 51, 1, 0, 6, 11, 1, 
		    0, 12, 13, 1, 0, 14, 16, 4, 0, 17, 18, 30, 30, 57, 58, 60, 61, 1, 
		    0, 19, 23, 535, 0, 93, 1, 0, 0, 0, 2, 136, 1, 0, 0, 0, 4, 138, 1, 
		    0, 0, 0, 6, 147, 1, 0, 0, 0, 8, 165, 1, 0, 0, 0, 10, 167, 1, 0, 0, 
		    0, 12, 173, 1, 0, 0, 0, 14, 181, 1, 0, 0, 0, 16, 189, 1, 0, 0, 0, 
		    18, 191, 1, 0, 0, 0, 20, 193, 1, 0, 0, 0, 22, 205, 1, 0, 0, 0, 24, 
		    219, 1, 0, 0, 0, 26, 228, 1, 0, 0, 0, 28, 250, 1, 0, 0, 0, 30, 254, 
		    1, 0, 0, 0, 32, 256, 1, 0, 0, 0, 34, 260, 1, 0, 0, 0, 36, 264, 1, 
		    0, 0, 0, 38, 271, 1, 0, 0, 0, 40, 282, 1, 0, 0, 0, 42, 286, 1, 0, 
		    0, 0, 44, 289, 1, 0, 0, 0, 46, 298, 1, 0, 0, 0, 48, 310, 1, 0, 0, 
		    0, 50, 322, 1, 0, 0, 0, 52, 324, 1, 0, 0, 0, 54, 328, 1, 0, 0, 0, 
		    56, 332, 1, 0, 0, 0, 58, 337, 1, 0, 0, 0, 60, 341, 1, 0, 0, 0, 62, 
		    354, 1, 0, 0, 0, 64, 369, 1, 0, 0, 0, 66, 371, 1, 0, 0, 0, 68, 382, 
		    1, 0, 0, 0, 70, 384, 1, 0, 0, 0, 72, 391, 1, 0, 0, 0, 74, 399, 1, 
		    0, 0, 0, 76, 401, 1, 0, 0, 0, 78, 412, 1, 0, 0, 0, 80, 423, 1, 0, 
		    0, 0, 82, 434, 1, 0, 0, 0, 84, 445, 1, 0, 0, 0, 86, 492, 1, 0, 0, 
		    0, 88, 496, 1, 0, 0, 0, 90, 498, 1, 0, 0, 0, 92, 94, 3, 2, 1, 0, 93, 
		    92, 1, 0, 0, 0, 94, 95, 1, 0, 0, 0, 95, 93, 1, 0, 0, 0, 95, 96, 1, 
		    0, 0, 0, 96, 97, 1, 0, 0, 0, 97, 98, 5, 0, 0, 1, 98, 1, 1, 0, 0, 0, 
		    99, 101, 3, 8, 4, 0, 100, 102, 5, 31, 0, 0, 101, 100, 1, 0, 0, 0, 
		    101, 102, 1, 0, 0, 0, 102, 137, 1, 0, 0, 0, 103, 105, 3, 14, 7, 0, 
		    104, 106, 5, 31, 0, 0, 105, 104, 1, 0, 0, 0, 105, 106, 1, 0, 0, 0, 
		    106, 137, 1, 0, 0, 0, 107, 109, 3, 6, 3, 0, 108, 110, 5, 31, 0, 0, 
		    109, 108, 1, 0, 0, 0, 109, 110, 1, 0, 0, 0, 110, 137, 1, 0, 0, 0, 
		    111, 113, 3, 10, 5, 0, 112, 114, 5, 31, 0, 0, 113, 112, 1, 0, 0, 0, 
		    113, 114, 1, 0, 0, 0, 114, 137, 1, 0, 0, 0, 115, 137, 3, 20, 10, 0, 
		    116, 137, 3, 22, 11, 0, 117, 137, 3, 28, 14, 0, 118, 137, 3, 32, 16, 
		    0, 119, 137, 3, 34, 17, 0, 120, 137, 3, 38, 19, 0, 121, 137, 3, 56, 
		    28, 0, 122, 137, 3, 36, 18, 0, 123, 125, 3, 52, 26, 0, 124, 126, 5, 
		    31, 0, 0, 125, 124, 1, 0, 0, 0, 125, 126, 1, 0, 0, 0, 126, 137, 1, 
		    0, 0, 0, 127, 129, 3, 54, 27, 0, 128, 130, 5, 31, 0, 0, 129, 128, 
		    1, 0, 0, 0, 129, 130, 1, 0, 0, 0, 130, 137, 1, 0, 0, 0, 131, 133, 
		    3, 66, 33, 0, 132, 134, 5, 31, 0, 0, 133, 132, 1, 0, 0, 0, 133, 134, 
		    1, 0, 0, 0, 134, 137, 1, 0, 0, 0, 135, 137, 3, 4, 2, 0, 136, 99, 1, 
		    0, 0, 0, 136, 103, 1, 0, 0, 0, 136, 107, 1, 0, 0, 0, 136, 111, 1, 
		    0, 0, 0, 136, 115, 1, 0, 0, 0, 136, 116, 1, 0, 0, 0, 136, 117, 1, 
		    0, 0, 0, 136, 118, 1, 0, 0, 0, 136, 119, 1, 0, 0, 0, 136, 120, 1, 
		    0, 0, 0, 136, 121, 1, 0, 0, 0, 136, 122, 1, 0, 0, 0, 136, 123, 1, 
		    0, 0, 0, 136, 127, 1, 0, 0, 0, 136, 131, 1, 0, 0, 0, 136, 135, 1, 
		    0, 0, 0, 137, 3, 1, 0, 0, 0, 138, 142, 5, 34, 0, 0, 139, 141, 3, 2, 
		    1, 0, 140, 139, 1, 0, 0, 0, 141, 144, 1, 0, 0, 0, 142, 140, 1, 0, 
		    0, 0, 142, 143, 1, 0, 0, 0, 143, 145, 1, 0, 0, 0, 144, 142, 1, 0, 
		    0, 0, 145, 146, 5, 35, 0, 0, 146, 5, 1, 0, 0, 0, 147, 148, 5, 27, 
		    0, 0, 148, 150, 5, 24, 0, 0, 149, 151, 3, 72, 36, 0, 150, 149, 1, 
		    0, 0, 0, 150, 151, 1, 0, 0, 0, 151, 152, 1, 0, 0, 0, 152, 153, 5, 
		    25, 0, 0, 153, 7, 1, 0, 0, 0, 154, 155, 5, 28, 0, 0, 155, 156, 3, 
		    12, 6, 0, 156, 159, 3, 68, 34, 0, 157, 158, 5, 4, 0, 0, 158, 160, 
		    3, 72, 36, 0, 159, 157, 1, 0, 0, 0, 159, 160, 1, 0, 0, 0, 160, 166, 
		    1, 0, 0, 0, 161, 162, 3, 12, 6, 0, 162, 163, 5, 5, 0, 0, 163, 164, 
		    3, 72, 36, 0, 164, 166, 1, 0, 0, 0, 165, 154, 1, 0, 0, 0, 165, 161, 
		    1, 0, 0, 0, 166, 9, 1, 0, 0, 0, 167, 168, 5, 29, 0, 0, 168, 169, 5, 
		    59, 0, 0, 169, 170, 3, 90, 45, 0, 170, 171, 5, 4, 0, 0, 171, 172, 
		    3, 74, 37, 0, 172, 11, 1, 0, 0, 0, 173, 178, 5, 59, 0, 0, 174, 175, 
		    5, 26, 0, 0, 175, 177, 5, 59, 0, 0, 176, 174, 1, 0, 0, 0, 177, 180, 
		    1, 0, 0, 0, 178, 176, 1, 0, 0, 0, 178, 179, 1, 0, 0, 0, 179, 13, 1, 
		    0, 0, 0, 180, 178, 1, 0, 0, 0, 181, 182, 3, 16, 8, 0, 182, 183, 3, 
		    18, 9, 0, 183, 184, 3, 72, 36, 0, 184, 15, 1, 0, 0, 0, 185, 190, 3, 
		    48, 24, 0, 186, 187, 5, 14, 0, 0, 187, 190, 3, 86, 43, 0, 188, 190, 
		    3, 12, 6, 0, 189, 185, 1, 0, 0, 0, 189, 186, 1, 0, 0, 0, 189, 188, 
		    1, 0, 0, 0, 190, 17, 1, 0, 0, 0, 191, 192, 7, 0, 0, 0, 192, 19, 1, 
		    0, 0, 0, 193, 197, 5, 32, 0, 0, 194, 195, 3, 8, 4, 0, 195, 196, 5, 
		    31, 0, 0, 196, 198, 1, 0, 0, 0, 197, 194, 1, 0, 0, 0, 197, 198, 1, 
		    0, 0, 0, 198, 199, 1, 0, 0, 0, 199, 200, 3, 74, 37, 0, 200, 203, 3, 
		    4, 2, 0, 201, 202, 5, 33, 0, 0, 202, 204, 3, 4, 2, 0, 203, 201, 1, 
		    0, 0, 0, 203, 204, 1, 0, 0, 0, 204, 21, 1, 0, 0, 0, 205, 206, 5, 39, 
		    0, 0, 206, 207, 3, 74, 37, 0, 207, 211, 5, 34, 0, 0, 208, 210, 3, 
		    24, 12, 0, 209, 208, 1, 0, 0, 0, 210, 213, 1, 0, 0, 0, 211, 209, 1, 
		    0, 0, 0, 211, 212, 1, 0, 0, 0, 212, 215, 1, 0, 0, 0, 213, 211, 1, 
		    0, 0, 0, 214, 216, 3, 26, 13, 0, 215, 214, 1, 0, 0, 0, 215, 216, 1, 
		    0, 0, 0, 216, 217, 1, 0, 0, 0, 217, 218, 5, 35, 0, 0, 218, 23, 1, 
		    0, 0, 0, 219, 220, 5, 40, 0, 0, 220, 221, 3, 72, 36, 0, 221, 225, 
		    5, 41, 0, 0, 222, 224, 3, 2, 1, 0, 223, 222, 1, 0, 0, 0, 224, 227, 
		    1, 0, 0, 0, 225, 223, 1, 0, 0, 0, 225, 226, 1, 0, 0, 0, 226, 25, 1, 
		    0, 0, 0, 227, 225, 1, 0, 0, 0, 228, 229, 5, 42, 0, 0, 229, 233, 5, 
		    41, 0, 0, 230, 232, 3, 2, 1, 0, 231, 230, 1, 0, 0, 0, 232, 235, 1, 
		    0, 0, 0, 233, 231, 1, 0, 0, 0, 233, 234, 1, 0, 0, 0, 234, 27, 1, 0, 
		    0, 0, 235, 233, 1, 0, 0, 0, 236, 237, 5, 43, 0, 0, 237, 238, 3, 30, 
		    15, 0, 238, 239, 5, 31, 0, 0, 239, 240, 3, 74, 37, 0, 240, 241, 5, 
		    31, 0, 0, 241, 242, 3, 50, 25, 0, 242, 243, 3, 4, 2, 0, 243, 251, 
		    1, 0, 0, 0, 244, 245, 5, 43, 0, 0, 245, 246, 3, 74, 37, 0, 246, 247, 
		    3, 4, 2, 0, 247, 251, 1, 0, 0, 0, 248, 249, 5, 43, 0, 0, 249, 251, 
		    3, 4, 2, 0, 250, 236, 1, 0, 0, 0, 250, 244, 1, 0, 0, 0, 250, 248, 
		    1, 0, 0, 0, 251, 29, 1, 0, 0, 0, 252, 255, 3, 8, 4, 0, 253, 255, 3, 
		    14, 7, 0, 254, 252, 1, 0, 0, 0, 254, 253, 1, 0, 0, 0, 255, 31, 1, 
		    0, 0, 0, 256, 258, 5, 44, 0, 0, 257, 259, 5, 31, 0, 0, 258, 257, 1, 
		    0, 0, 0, 258, 259, 1, 0, 0, 0, 259, 33, 1, 0, 0, 0, 260, 262, 5, 45, 
		    0, 0, 261, 263, 5, 31, 0, 0, 262, 261, 1, 0, 0, 0, 262, 263, 1, 0, 
		    0, 0, 263, 35, 1, 0, 0, 0, 264, 266, 5, 46, 0, 0, 265, 267, 3, 72, 
		    36, 0, 266, 265, 1, 0, 0, 0, 266, 267, 1, 0, 0, 0, 267, 269, 1, 0, 
		    0, 0, 268, 270, 5, 31, 0, 0, 269, 268, 1, 0, 0, 0, 269, 270, 1, 0, 
		    0, 0, 270, 37, 1, 0, 0, 0, 271, 272, 5, 59, 0, 0, 272, 273, 3, 40, 
		    20, 0, 273, 274, 3, 18, 9, 0, 274, 276, 3, 74, 37, 0, 275, 277, 5, 
		    31, 0, 0, 276, 275, 1, 0, 0, 0, 276, 277, 1, 0, 0, 0, 277, 39, 1, 
		    0, 0, 0, 278, 279, 5, 36, 0, 0, 279, 280, 3, 74, 37, 0, 280, 281, 
		    5, 37, 0, 0, 281, 283, 1, 0, 0, 0, 282, 278, 1, 0, 0, 0, 283, 284, 
		    1, 0, 0, 0, 284, 282, 1, 0, 0, 0, 284, 285, 1, 0, 0, 0, 285, 41, 1, 
		    0, 0, 0, 286, 287, 3, 70, 35, 0, 287, 288, 3, 44, 22, 0, 288, 43, 
		    1, 0, 0, 0, 289, 290, 5, 34, 0, 0, 290, 292, 3, 46, 23, 0, 291, 293, 
		    5, 26, 0, 0, 292, 291, 1, 0, 0, 0, 292, 293, 1, 0, 0, 0, 293, 294, 
		    1, 0, 0, 0, 294, 295, 5, 35, 0, 0, 295, 45, 1, 0, 0, 0, 296, 299, 
		    3, 74, 37, 0, 297, 299, 3, 44, 22, 0, 298, 296, 1, 0, 0, 0, 298, 297, 
		    1, 0, 0, 0, 299, 307, 1, 0, 0, 0, 300, 303, 5, 26, 0, 0, 301, 304, 
		    3, 74, 37, 0, 302, 304, 3, 44, 22, 0, 303, 301, 1, 0, 0, 0, 303, 302, 
		    1, 0, 0, 0, 304, 306, 1, 0, 0, 0, 305, 300, 1, 0, 0, 0, 306, 309, 
		    1, 0, 0, 0, 307, 305, 1, 0, 0, 0, 307, 308, 1, 0, 0, 0, 308, 47, 1, 
		    0, 0, 0, 309, 307, 1, 0, 0, 0, 310, 315, 5, 59, 0, 0, 311, 312, 5, 
		    36, 0, 0, 312, 313, 3, 74, 37, 0, 313, 314, 5, 37, 0, 0, 314, 316, 
		    1, 0, 0, 0, 315, 311, 1, 0, 0, 0, 316, 317, 1, 0, 0, 0, 317, 315, 
		    1, 0, 0, 0, 317, 318, 1, 0, 0, 0, 318, 49, 1, 0, 0, 0, 319, 323, 3, 
		    52, 26, 0, 320, 323, 3, 54, 27, 0, 321, 323, 3, 14, 7, 0, 322, 319, 
		    1, 0, 0, 0, 322, 320, 1, 0, 0, 0, 322, 321, 1, 0, 0, 0, 323, 51, 1, 
		    0, 0, 0, 324, 325, 5, 59, 0, 0, 325, 326, 5, 12, 0, 0, 326, 327, 5, 
		    12, 0, 0, 327, 53, 1, 0, 0, 0, 328, 329, 5, 59, 0, 0, 329, 330, 5, 
		    13, 0, 0, 330, 331, 5, 13, 0, 0, 331, 55, 1, 0, 0, 0, 332, 333, 5, 
		    52, 0, 0, 333, 334, 5, 59, 0, 0, 334, 335, 3, 58, 29, 0, 335, 336, 
		    3, 4, 2, 0, 336, 57, 1, 0, 0, 0, 337, 339, 3, 60, 30, 0, 338, 340, 
		    3, 64, 32, 0, 339, 338, 1, 0, 0, 0, 339, 340, 1, 0, 0, 0, 340, 59, 
		    1, 0, 0, 0, 341, 350, 5, 24, 0, 0, 342, 347, 3, 62, 31, 0, 343, 344, 
		    5, 26, 0, 0, 344, 346, 3, 62, 31, 0, 345, 343, 1, 0, 0, 0, 346, 349, 
		    1, 0, 0, 0, 347, 345, 1, 0, 0, 0, 347, 348, 1, 0, 0, 0, 348, 351, 
		    1, 0, 0, 0, 349, 347, 1, 0, 0, 0, 350, 342, 1, 0, 0, 0, 350, 351, 
		    1, 0, 0, 0, 351, 352, 1, 0, 0, 0, 352, 353, 5, 25, 0, 0, 353, 61, 
		    1, 0, 0, 0, 354, 355, 3, 12, 6, 0, 355, 356, 3, 68, 34, 0, 356, 63, 
		    1, 0, 0, 0, 357, 370, 3, 68, 34, 0, 358, 359, 5, 24, 0, 0, 359, 364, 
		    3, 68, 34, 0, 360, 361, 5, 26, 0, 0, 361, 363, 3, 68, 34, 0, 362, 
		    360, 1, 0, 0, 0, 363, 366, 1, 0, 0, 0, 364, 362, 1, 0, 0, 0, 364, 
		    365, 1, 0, 0, 0, 365, 367, 1, 0, 0, 0, 366, 364, 1, 0, 0, 0, 367, 
		    368, 5, 25, 0, 0, 368, 370, 1, 0, 0, 0, 369, 357, 1, 0, 0, 0, 369, 
		    358, 1, 0, 0, 0, 370, 65, 1, 0, 0, 0, 371, 372, 5, 59, 0, 0, 372, 
		    374, 5, 24, 0, 0, 373, 375, 3, 72, 36, 0, 374, 373, 1, 0, 0, 0, 374, 
		    375, 1, 0, 0, 0, 375, 376, 1, 0, 0, 0, 376, 377, 5, 25, 0, 0, 377, 
		    67, 1, 0, 0, 0, 378, 383, 3, 90, 45, 0, 379, 380, 5, 14, 0, 0, 380, 
		    383, 3, 68, 34, 0, 381, 383, 3, 70, 35, 0, 382, 378, 1, 0, 0, 0, 382, 
		    379, 1, 0, 0, 0, 382, 381, 1, 0, 0, 0, 383, 69, 1, 0, 0, 0, 384, 386, 
		    5, 36, 0, 0, 385, 387, 3, 74, 37, 0, 386, 385, 1, 0, 0, 0, 386, 387, 
		    1, 0, 0, 0, 387, 388, 1, 0, 0, 0, 388, 389, 5, 37, 0, 0, 389, 390, 
		    3, 68, 34, 0, 390, 71, 1, 0, 0, 0, 391, 396, 3, 74, 37, 0, 392, 393, 
		    5, 26, 0, 0, 393, 395, 3, 74, 37, 0, 394, 392, 1, 0, 0, 0, 395, 398, 
		    1, 0, 0, 0, 396, 394, 1, 0, 0, 0, 396, 397, 1, 0, 0, 0, 397, 73, 1, 
		    0, 0, 0, 398, 396, 1, 0, 0, 0, 399, 400, 3, 76, 38, 0, 400, 75, 1, 
		    0, 0, 0, 401, 402, 6, 38, -1, 0, 402, 403, 3, 78, 39, 0, 403, 409, 
		    1, 0, 0, 0, 404, 405, 10, 2, 0, 0, 405, 406, 5, 1, 0, 0, 406, 408, 
		    3, 78, 39, 0, 407, 404, 1, 0, 0, 0, 408, 411, 1, 0, 0, 0, 409, 407, 
		    1, 0, 0, 0, 409, 410, 1, 0, 0, 0, 410, 77, 1, 0, 0, 0, 411, 409, 1, 
		    0, 0, 0, 412, 413, 6, 39, -1, 0, 413, 414, 3, 80, 40, 0, 414, 420, 
		    1, 0, 0, 0, 415, 416, 10, 2, 0, 0, 416, 417, 5, 2, 0, 0, 417, 419, 
		    3, 80, 40, 0, 418, 415, 1, 0, 0, 0, 419, 422, 1, 0, 0, 0, 420, 418, 
		    1, 0, 0, 0, 420, 421, 1, 0, 0, 0, 421, 79, 1, 0, 0, 0, 422, 420, 1, 
		    0, 0, 0, 423, 424, 6, 40, -1, 0, 424, 425, 3, 82, 41, 0, 425, 431, 
		    1, 0, 0, 0, 426, 427, 10, 2, 0, 0, 427, 428, 7, 1, 0, 0, 428, 430, 
		    3, 82, 41, 0, 429, 426, 1, 0, 0, 0, 430, 433, 1, 0, 0, 0, 431, 429, 
		    1, 0, 0, 0, 431, 432, 1, 0, 0, 0, 432, 81, 1, 0, 0, 0, 433, 431, 1, 
		    0, 0, 0, 434, 435, 6, 41, -1, 0, 435, 436, 3, 84, 42, 0, 436, 442, 
		    1, 0, 0, 0, 437, 438, 10, 2, 0, 0, 438, 439, 7, 2, 0, 0, 439, 441, 
		    3, 84, 42, 0, 440, 437, 1, 0, 0, 0, 441, 444, 1, 0, 0, 0, 442, 440, 
		    1, 0, 0, 0, 442, 443, 1, 0, 0, 0, 443, 83, 1, 0, 0, 0, 444, 442, 1, 
		    0, 0, 0, 445, 446, 6, 42, -1, 0, 446, 447, 3, 86, 43, 0, 447, 453, 
		    1, 0, 0, 0, 448, 449, 10, 2, 0, 0, 449, 450, 7, 3, 0, 0, 450, 452, 
		    3, 86, 43, 0, 451, 448, 1, 0, 0, 0, 452, 455, 1, 0, 0, 0, 453, 451, 
		    1, 0, 0, 0, 453, 454, 1, 0, 0, 0, 454, 85, 1, 0, 0, 0, 455, 453, 1, 
		    0, 0, 0, 456, 457, 5, 24, 0, 0, 457, 458, 3, 74, 37, 0, 458, 459, 
		    5, 25, 0, 0, 459, 493, 1, 0, 0, 0, 460, 461, 5, 12, 0, 0, 461, 493, 
		    3, 86, 43, 0, 462, 463, 5, 13, 0, 0, 463, 493, 3, 86, 43, 0, 464, 
		    465, 5, 38, 0, 0, 465, 493, 3, 86, 43, 0, 466, 467, 5, 14, 0, 0, 467, 
		    493, 3, 86, 43, 0, 468, 469, 5, 3, 0, 0, 469, 493, 3, 86, 43, 0, 470, 
		    493, 3, 88, 44, 0, 471, 472, 5, 54, 0, 0, 472, 473, 5, 24, 0, 0, 473, 
		    493, 5, 25, 0, 0, 474, 475, 5, 55, 0, 0, 475, 476, 5, 24, 0, 0, 476, 
		    477, 3, 72, 36, 0, 477, 478, 5, 25, 0, 0, 478, 493, 1, 0, 0, 0, 479, 
		    480, 5, 56, 0, 0, 480, 481, 5, 24, 0, 0, 481, 482, 3, 74, 37, 0, 482, 
		    483, 5, 25, 0, 0, 483, 493, 1, 0, 0, 0, 484, 485, 5, 53, 0, 0, 485, 
		    486, 5, 24, 0, 0, 486, 487, 3, 74, 37, 0, 487, 488, 5, 25, 0, 0, 488, 
		    493, 1, 0, 0, 0, 489, 493, 3, 66, 33, 0, 490, 493, 3, 48, 24, 0, 491, 
		    493, 5, 59, 0, 0, 492, 456, 1, 0, 0, 0, 492, 460, 1, 0, 0, 0, 492, 
		    462, 1, 0, 0, 0, 492, 464, 1, 0, 0, 0, 492, 466, 1, 0, 0, 0, 492, 
		    468, 1, 0, 0, 0, 492, 470, 1, 0, 0, 0, 492, 471, 1, 0, 0, 0, 492, 
		    474, 1, 0, 0, 0, 492, 479, 1, 0, 0, 0, 492, 484, 1, 0, 0, 0, 492, 
		    489, 1, 0, 0, 0, 492, 490, 1, 0, 0, 0, 492, 491, 1, 0, 0, 0, 493, 
		    87, 1, 0, 0, 0, 494, 497, 7, 4, 0, 0, 495, 497, 3, 42, 21, 0, 496, 
		    494, 1, 0, 0, 0, 496, 495, 1, 0, 0, 0, 497, 89, 1, 0, 0, 0, 498, 499, 
		    7, 5, 0, 0, 499, 91, 1, 0, 0, 0, 51, 95, 101, 105, 109, 113, 125, 
		    129, 133, 136, 142, 150, 159, 165, 178, 189, 197, 203, 211, 215, 225, 
		    233, 250, 254, 258, 262, 266, 269, 276, 284, 292, 298, 303, 307, 317, 
		    322, 339, 347, 350, 364, 369, 374, 382, 386, 396, 409, 420, 431, 442, 
		    453, 492, 496];
		protected static $atn;
		protected static $decisionToDFA;
		protected static $sharedContextCache;

		public function __construct(TokenStream $input)
		{
			parent::__construct($input);

			self::initialize();

			$this->interp = new ParserATNSimulator($this, self::$atn, self::$decisionToDFA, self::$sharedContextCache);
		}

		private static function initialize(): void
		{
			if (self::$atn !== null) {
				return;
			}

			RuntimeMetaData::checkVersion('4.13.2', RuntimeMetaData::VERSION);

			$atn = (new ATNDeserializer())->deserialize(self::SERIALIZED_ATN);

			$decisionToDFA = [];
			for ($i = 0, $count = $atn->getNumberOfDecisions(); $i < $count; $i++) {
				$decisionToDFA[] = new DFA($atn->getDecisionState($i), $i);
			}

			self::$atn = $atn;
			self::$decisionToDFA = $decisionToDFA;
			self::$sharedContextCache = new PredictionContextCache();
		}

		public function getGrammarFileName(): string
		{
			return "Grammar.g4";
		}

		public function getRuleNames(): array
		{
			return self::RULE_NAMES;
		}

		public function getSerializedATN(): array
		{
			return self::SERIALIZED_ATN;
		}

		public function getATN(): ATN
		{
			return self::$atn;
		}

		public function getVocabulary(): Vocabulary
        {
            static $vocabulary;

			return $vocabulary = $vocabulary ?? new VocabularyImpl(self::LITERAL_NAMES, self::SYMBOLIC_NAMES);
        }

		/**
		 * @throws RecognitionException
		 */
		public function program(): Context\ProgramContext
		{
		    $localContext = new Context\ProgramContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 0, self::RULE_program);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(93); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(92);
		        	$this->statement();
		        	$this->setState(95); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 581096865496317952) !== 0));
		        $this->setState(97);
		        $this->match(self::EOF);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function statement(): Context\StatementContext
		{
		    $localContext = new Context\StatementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 2, self::RULE_statement);

		    try {
		        $this->setState(136);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 8, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\DeclStmtContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(99);
		        	    $this->declareStmt();
		        	    $this->setState(101);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(100);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 2:
		        	    $localContext = new Context\AssignStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(103);
		        	    $this->assignStmt();
		        	    $this->setState(105);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(104);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 3:
		        	    $localContext = new Context\PrintStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(107);
		        	    $this->printStmt();
		        	    $this->setState(109);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(108);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 4:
		        	    $localContext = new Context\ConstStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(111);
		        	    $this->constStmt();
		        	    $this->setState(113);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(112);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 5:
		        	    $localContext = new Context\IfStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(115);
		        	    $this->ifStmt();
		        	break;

		        	case 6:
		        	    $localContext = new Context\SwitchStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(116);
		        	    $this->switchStmt();
		        	break;

		        	case 7:
		        	    $localContext = new Context\ForStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(117);
		        	    $this->forStmt();
		        	break;

		        	case 8:
		        	    $localContext = new Context\BreakStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(118);
		        	    $this->break_stmt();
		        	break;

		        	case 9:
		        	    $localContext = new Context\ContinueStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(119);
		        	    $this->continue_stmt();
		        	break;

		        	case 10:
		        	    $localContext = new Context\ArrayAssingStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(120);
		        	    $this->arrayAssign();
		        	break;

		        	case 11:
		        	    $localContext = new Context\FunctionStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(121);
		        	    $this->funcStmt();
		        	break;

		        	case 12:
		        	    $localContext = new Context\ReturnStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(122);
		        	    $this->return_stmt();
		        	break;

		        	case 13:
		        	    $localContext = new Context\IncrementStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(123);
		        	    $this->increment();
		        	    $this->setState(125);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(124);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 14:
		        	    $localContext = new Context\DecrementStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(127);
		        	    $this->decrement();
		        	    $this->setState(129);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(128);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 15:
		        	    $localContext = new Context\CallStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 15);
		        	    $this->setState(131);
		        	    $this->funcAccess();
		        	    $this->setState(133);
		        	    $this->errorHandler->sync($this);
		        	    $_la = $this->input->LA(1);

		        	    if ($_la === self::SEMICOLON) {
		        	    	$this->setState(132);
		        	    	$this->match(self::SEMICOLON);
		        	    }
		        	break;

		        	case 16:
		        	    $localContext = new Context\BlockStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 16);
		        	    $this->setState(135);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function block(): Context\BlockContext
		{
		    $localContext = new Context\BlockContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 4, self::RULE_block);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(138);
		        $this->match(self::KEY_OPEN);
		        $this->setState(142);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 581096865496317952) !== 0)) {
		        	$this->setState(139);
		        	$this->statement();
		        	$this->setState(144);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(145);
		        $this->match(self::KEY_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function printStmt(): Context\PrintStmtContext
		{
		    $localContext = new Context\PrintStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 6, self::RULE_printStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(147);
		        $this->match(self::FMT_PRINT);
		        $this->setState(148);
		        $this->match(self::PAR_OPEN);
		        $this->setState(150);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4602679163860971528) !== 0)) {
		        	$this->setState(149);
		        	$this->exprList();
		        }
		        $this->setState(152);
		        $this->match(self::PAR_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function declareStmt(): Context\DeclareStmtContext
		{
		    $localContext = new Context\DeclareStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 8, self::RULE_declareStmt);

		    try {
		        $this->setState(165);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::VAR:
		            	$localContext = new Context\VarDeclContext($localContext);
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(154);
		            	$this->match(self::VAR);
		            	$this->setState(155);
		            	$this->idList();
		            	$this->setState(156);
		            	$this->type();
		            	$this->setState(159);
		            	$this->errorHandler->sync($this);
		            	$_la = $this->input->LA(1);

		            	if ($_la === self::EQUAL) {
		            		$this->setState(157);
		            		$this->match(self::EQUAL);
		            		$this->setState(158);
		            		$this->exprList();
		            	}
		            	break;

		            case self::ID:
		            	$localContext = new Context\ShortDeclContext($localContext);
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(161);
		            	$this->idList();
		            	$this->setState(162);
		            	$this->match(self::COLON_EQUAL);
		            	$this->setState(163);
		            	$this->exprList();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function constStmt(): Context\ConstStmtContext
		{
		    $localContext = new Context\ConstStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 10, self::RULE_constStmt);

		    try {
		        $localContext = new Context\ConstDeclContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(167);
		        $this->match(self::CONST);
		        $this->setState(168);
		        $this->match(self::ID);
		        $this->setState(169);
		        $this->typesStatics();
		        $this->setState(170);
		        $this->match(self::EQUAL);
		        $this->setState(171);
		        $this->expression();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function idList(): Context\IdListContext
		{
		    $localContext = new Context\IdListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 12, self::RULE_idList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(173);
		        $this->match(self::ID);
		        $this->setState(178);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(174);
		        	$this->match(self::COMMA);
		        	$this->setState(175);
		        	$this->match(self::ID);
		        	$this->setState(180);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assignStmt(): Context\AssignStmtContext
		{
		    $localContext = new Context\AssignStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 14, self::RULE_assignStmt);

		    try {
		        $localContext = new Context\AssingmentContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(181);
		        $this->assingExp();
		        $this->setState(182);
		        $this->typeAssing();
		        $this->setState(183);
		        $this->exprList();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function assingExp(): Context\AssingExpContext
		{
		    $localContext = new Context\AssingExpContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 16, self::RULE_assingExp);

		    try {
		        $this->setState(189);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 14, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(185);
		        	    $this->arrayAccess();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(186);
		        	    $this->match(self::MULT);
		        	    $this->setState(187);
		        	    $this->factor();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(188);
		        	    $this->idList();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function typeAssing(): Context\TypeAssingContext
		{
		    $localContext = new Context\TypeAssingContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 18, self::RULE_typeAssing);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(191);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4362862139015184) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function ifStmt(): Context\IfStmtContext
		{
		    $localContext = new Context\IfStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 20, self::RULE_ifStmt);

		    try {
		        $localContext = new Context\IfDclContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(193);
		        $this->match(self::IF);
		        $this->setState(197);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 15, $this->ctx)) {
		            case 1:
		        	    $this->setState(194);
		        	    $this->declareStmt();
		        	    $this->setState(195);
		        	    $this->match(self::SEMICOLON);
		        	break;
		        }
		        $this->setState(199);
		        $this->expression();
		        $this->setState(200);
		        $this->block();
		        $this->setState(203);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ELSE) {
		        	$this->setState(201);
		        	$this->match(self::ELSE);
		        	$this->setState(202);
		        	$this->block();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchStmt(): Context\SwitchStmtContext
		{
		    $localContext = new Context\SwitchStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 22, self::RULE_switchStmt);

		    try {
		        $localContext = new Context\SwitchDclContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(205);
		        $this->match(self::SWITCH);
		        $this->setState(206);
		        $this->expression();
		        $this->setState(207);
		        $this->match(self::KEY_OPEN);
		        $this->setState(211);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::CASE) {
		        	$this->setState(208);
		        	$this->switchCase();
		        	$this->setState(213);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		        $this->setState(215);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::DEFAULT) {
		        	$this->setState(214);
		        	$this->caseDefault();
		        }
		        $this->setState(217);
		        $this->match(self::KEY_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function switchCase(): Context\SwitchCaseContext
		{
		    $localContext = new Context\SwitchCaseContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 24, self::RULE_switchCase);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(219);
		        $this->match(self::CASE);
		        $this->setState(220);
		        $this->exprList();
		        $this->setState(221);
		        $this->match(self::COLON);
		        $this->setState(225);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 581096865496317952) !== 0)) {
		        	$this->setState(222);
		        	$this->statement();
		        	$this->setState(227);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function caseDefault(): Context\CaseDefaultContext
		{
		    $localContext = new Context\CaseDefaultContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 26, self::RULE_caseDefault);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(228);
		        $this->match(self::DEFAULT);
		        $this->setState(229);
		        $this->match(self::COLON);
		        $this->setState(233);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 581096865496317952) !== 0)) {
		        	$this->setState(230);
		        	$this->statement();
		        	$this->setState(235);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forStmt(): Context\ForStmtContext
		{
		    $localContext = new Context\ForStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 28, self::RULE_forStmt);

		    try {
		        $this->setState(250);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 21, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\ForDcl1Context($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(236);
		        	    $this->match(self::FOR);
		        	    $this->setState(237);
		        	    $this->for_init();
		        	    $this->setState(238);
		        	    $this->match(self::SEMICOLON);
		        	    $this->setState(239);
		        	    $this->expression();
		        	    $this->setState(240);
		        	    $this->match(self::SEMICOLON);
		        	    $this->setState(241);
		        	    $this->forupdate();
		        	    $this->setState(242);
		        	    $this->block();
		        	break;

		        	case 2:
		        	    $localContext = new Context\ForDcl2Context($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(244);
		        	    $this->match(self::FOR);
		        	    $this->setState(245);
		        	    $this->expression();
		        	    $this->setState(246);
		        	    $this->block();
		        	break;

		        	case 3:
		        	    $localContext = new Context\ForDcl3Context($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(248);
		        	    $this->match(self::FOR);
		        	    $this->setState(249);
		        	    $this->block();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function for_init(): Context\For_initContext
		{
		    $localContext = new Context\For_initContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 30, self::RULE_for_init);

		    try {
		        $this->setState(254);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 22, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(252);
		        	    $this->declareStmt();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(253);
		        	    $this->assignStmt();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function break_stmt(): Context\Break_stmtContext
		{
		    $localContext = new Context\Break_stmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 32, self::RULE_break_stmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(256);
		        $this->match(self::BREAK);
		        $this->setState(258);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SEMICOLON) {
		        	$this->setState(257);
		        	$this->match(self::SEMICOLON);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function continue_stmt(): Context\Continue_stmtContext
		{
		    $localContext = new Context\Continue_stmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 34, self::RULE_continue_stmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(260);
		        $this->match(self::CONTINUE);
		        $this->setState(262);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SEMICOLON) {
		        	$this->setState(261);
		        	$this->match(self::SEMICOLON);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function return_stmt(): Context\Return_stmtContext
		{
		    $localContext = new Context\Return_stmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 36, self::RULE_return_stmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(264);
		        $this->match(self::RETURN);
		        $this->setState(266);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 25, $this->ctx)) {
		            case 1:
		        	    $this->setState(265);
		        	    $this->exprList();
		        	break;
		        }
		        $this->setState(269);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SEMICOLON) {
		        	$this->setState(268);
		        	$this->match(self::SEMICOLON);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAssign(): Context\ArrayAssignContext
		{
		    $localContext = new Context\ArrayAssignContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 38, self::RULE_arrayAssign);

		    try {
		        $localContext = new Context\AsingArrayContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(271);
		        $this->match(self::ID);
		        $this->setState(272);
		        $this->arrayDimension();
		        $this->setState(273);
		        $this->typeAssing();
		        $this->setState(274);
		        $this->expression();
		        $this->setState(276);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::SEMICOLON) {
		        	$this->setState(275);
		        	$this->match(self::SEMICOLON);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayDimension(): Context\ArrayDimensionContext
		{
		    $localContext = new Context\ArrayDimensionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 40, self::RULE_arrayDimension);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(282); 
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        do {
		        	$this->setState(278);
		        	$this->match(self::CLASP_OPEN);
		        	$this->setState(279);
		        	$this->expression();
		        	$this->setState(280);
		        	$this->match(self::CLASP_CLOSE);
		        	$this->setState(284); 
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        } while ($_la === self::CLASP_OPEN);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayLiteral(): Context\ArrayLiteralContext
		{
		    $localContext = new Context\ArrayLiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 42, self::RULE_arrayLiteral);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(286);
		        $this->arrayType();
		        $this->setState(287);
		        $this->arrayContent();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayContent(): Context\ArrayContentContext
		{
		    $localContext = new Context\ArrayContentContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 44, self::RULE_arrayContent);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(289);
		        $this->match(self::KEY_OPEN);
		        $this->setState(290);
		        $this->arrayValues();
		        $this->setState(292);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::COMMA) {
		        	$this->setState(291);
		        	$this->match(self::COMMA);
		        }
		        $this->setState(294);
		        $this->match(self::KEY_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayValues(): Context\ArrayValuesContext
		{
		    $localContext = new Context\ArrayValuesContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 46, self::RULE_arrayValues);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(298);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::NOT:
		            case self::PLUS:
		            case self::MINUS:
		            case self::MULT:
		            case self::TRUE:
		            case self::FALSE:
		            case self::PAR_OPEN:
		            case self::NIL:
		            case self::CLASP_OPEN:
		            case self::AMPERSAND:
		            case self::LEN:
		            case self::NOW:
		            case self::SUBSTR:
		            case self::TYPEOF:
		            case self::STRING:
		            case self::CHAR:
		            case self::ID:
		            case self::INT:
		            case self::FLOAT:
		            	$this->setState(296);
		            	$this->expression();
		            	break;

		            case self::KEY_OPEN:
		            	$this->setState(297);
		            	$this->arrayContent();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		        $this->setState(307);
		        $this->errorHandler->sync($this);

		        $alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);

		        while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
		        	if ($alt === 1) {
		        		$this->setState(300);
		        		$this->match(self::COMMA);
		        		$this->setState(303);
		        		$this->errorHandler->sync($this);

		        		switch ($this->input->LA(1)) {
		        		    case self::NOT:
		        		    case self::PLUS:
		        		    case self::MINUS:
		        		    case self::MULT:
		        		    case self::TRUE:
		        		    case self::FALSE:
		        		    case self::PAR_OPEN:
		        		    case self::NIL:
		        		    case self::CLASP_OPEN:
		        		    case self::AMPERSAND:
		        		    case self::LEN:
		        		    case self::NOW:
		        		    case self::SUBSTR:
		        		    case self::TYPEOF:
		        		    case self::STRING:
		        		    case self::CHAR:
		        		    case self::ID:
		        		    case self::INT:
		        		    case self::FLOAT:
		        		    	$this->setState(301);
		        		    	$this->expression();
		        		    	break;

		        		    case self::KEY_OPEN:
		        		    	$this->setState(302);
		        		    	$this->arrayContent();
		        		    	break;

		        		default:
		        			throw new NoViableAltException($this);
		        		} 
		        	}

		        	$this->setState(309);
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 32, $this->ctx);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayAccess(): Context\ArrayAccessContext
		{
		    $localContext = new Context\ArrayAccessContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 48, self::RULE_arrayAccess);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(310);
		        $this->match(self::ID);
		        $this->setState(315); 
		        $this->errorHandler->sync($this);

		        $alt = 1;

		        do {
		        	switch ($alt) {
		        	case 1:
		        		$this->setState(311);
		        		$this->match(self::CLASP_OPEN);
		        		$this->setState(312);
		        		$this->expression();
		        		$this->setState(313);
		        		$this->match(self::CLASP_CLOSE);
		        		break;
		        	default:
		        		throw new NoViableAltException($this);
		        	}

		        	$this->setState(317); 
		        	$this->errorHandler->sync($this);

		        	$alt = $this->getInterpreter()->adaptivePredict($this->input, 33, $this->ctx);
		        } while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function forupdate(): Context\ForupdateContext
		{
		    $localContext = new Context\ForupdateContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 50, self::RULE_forupdate);

		    try {
		        $this->setState(322);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 34, $this->ctx)) {
		        	case 1:
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(319);
		        	    $this->increment();
		        	break;

		        	case 2:
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(320);
		        	    $this->decrement();
		        	break;

		        	case 3:
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(321);
		        	    $this->assignStmt();
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function increment(): Context\IncrementContext
		{
		    $localContext = new Context\IncrementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 52, self::RULE_increment);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(324);
		        $this->match(self::ID);
		        $this->setState(325);
		        $this->match(self::PLUS);
		        $this->setState(326);
		        $this->match(self::PLUS);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function decrement(): Context\DecrementContext
		{
		    $localContext = new Context\DecrementContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 54, self::RULE_decrement);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(328);
		        $this->match(self::ID);
		        $this->setState(329);
		        $this->match(self::MINUS);
		        $this->setState(330);
		        $this->match(self::MINUS);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcStmt(): Context\FuncStmtContext
		{
		    $localContext = new Context\FuncStmtContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 56, self::RULE_funcStmt);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(332);
		        $this->match(self::FUNC);
		        $this->setState(333);
		        $this->match(self::ID);
		        $this->setState(334);
		        $this->funcParRet();
		        $this->setState(335);
		        $this->block();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcParRet(): Context\FuncParRetContext
		{
		    $localContext = new Context\FuncParRetContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 58, self::RULE_funcParRet);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(337);
		        $this->parameters();
		        $this->setState(339);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 68752523264) !== 0)) {
		        	$this->setState(338);
		        	$this->result();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function parameters(): Context\ParametersContext
		{
		    $localContext = new Context\ParametersContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 60, self::RULE_parameters);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(341);
		        $this->match(self::PAR_OPEN);
		        $this->setState(350);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if ($_la === self::ID) {
		        	$this->setState(342);
		        	$this->paramDcl();
		        	$this->setState(347);
		        	$this->errorHandler->sync($this);

		        	$_la = $this->input->LA(1);
		        	while ($_la === self::COMMA) {
		        		$this->setState(343);
		        		$this->match(self::COMMA);
		        		$this->setState(344);
		        		$this->paramDcl();
		        		$this->setState(349);
		        		$this->errorHandler->sync($this);
		        		$_la = $this->input->LA(1);
		        	}
		        }
		        $this->setState(352);
		        $this->match(self::PAR_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function paramDcl(): Context\ParamDclContext
		{
		    $localContext = new Context\ParamDclContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 62, self::RULE_paramDcl);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(354);
		        $this->idList();
		        $this->setState(355);
		        $this->type();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function result(): Context\ResultContext
		{
		    $localContext = new Context\ResultContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 64, self::RULE_result);

		    try {
		        $this->setState(369);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::MULT:
		            case self::INT_R:
		            case self::FLOAT_R:
		            case self::BOOL_R:
		            case self::CHAR_R:
		            case self::STRING_R:
		            case self::CLASP_OPEN:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(357);
		            	$this->type();
		            	break;

		            case self::PAR_OPEN:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(358);
		            	$this->match(self::PAR_OPEN);
		            	$this->setState(359);
		            	$this->type();
		            	$this->setState(364);
		            	$this->errorHandler->sync($this);

		            	$_la = $this->input->LA(1);
		            	while ($_la === self::COMMA) {
		            		$this->setState(360);
		            		$this->match(self::COMMA);
		            		$this->setState(361);
		            		$this->type();
		            		$this->setState(366);
		            		$this->errorHandler->sync($this);
		            		$_la = $this->input->LA(1);
		            	}
		            	$this->setState(367);
		            	$this->match(self::PAR_CLOSE);
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function funcAccess(): Context\FuncAccessContext
		{
		    $localContext = new Context\FuncAccessContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 66, self::RULE_funcAccess);

		    try {
		        $localContext = new Context\FuncCallExprContext($localContext);
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(371);
		        $this->match(self::ID);
		        $this->setState(372);
		        $this->match(self::PAR_OPEN);
		        $this->setState(374);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4602679163860971528) !== 0)) {
		        	$this->setState(373);
		        	$this->exprList();
		        }
		        $this->setState(376);
		        $this->match(self::PAR_CLOSE);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function type(): Context\TypeContext
		{
		    $localContext = new Context\TypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 68, self::RULE_type);

		    try {
		        $this->setState(382);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::INT_R:
		            case self::FLOAT_R:
		            case self::BOOL_R:
		            case self::CHAR_R:
		            case self::STRING_R:
		            	$localContext = new Context\TypePrimitiveContext($localContext);
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(378);
		            	$this->typesStatics();
		            	break;

		            case self::MULT:
		            	$localContext = new Context\TypePointerContext($localContext);
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(379);
		            	$this->match(self::MULT);
		            	$this->setState(380);
		            	$this->type();
		            	break;

		            case self::CLASP_OPEN:
		            	$localContext = new Context\TypeArrayDefContext($localContext);
		            	$this->enterOuterAlt($localContext, 3);
		            	$this->setState(381);
		            	$this->arrayType();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function arrayType(): Context\ArrayTypeContext
		{
		    $localContext = new Context\ArrayTypeContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 70, self::RULE_arrayType);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(384);
		        $this->match(self::CLASP_OPEN);
		        $this->setState(386);
		        $this->errorHandler->sync($this);
		        $_la = $this->input->LA(1);

		        if (((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4602679163860971528) !== 0)) {
		        	$this->setState(385);
		        	$this->expression();
		        }
		        $this->setState(388);
		        $this->match(self::CLASP_CLOSE);
		        $this->setState(389);
		        $this->type();
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function exprList(): Context\ExprListContext
		{
		    $localContext = new Context\ExprListContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 72, self::RULE_exprList);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(391);
		        $this->expression();
		        $this->setState(396);
		        $this->errorHandler->sync($this);

		        $_la = $this->input->LA(1);
		        while ($_la === self::COMMA) {
		        	$this->setState(392);
		        	$this->match(self::COMMA);
		        	$this->setState(393);
		        	$this->expression();
		        	$this->setState(398);
		        	$this->errorHandler->sync($this);
		        	$_la = $this->input->LA(1);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression(): Context\ExpressionContext
		{
		    $localContext = new Context\ExpressionContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 74, self::RULE_expression);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(399);
		        $this->recursiveLogicOr(0);
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicOr(): Context\LogicOrContext
		{
			return $this->recursiveLogicOr(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveLogicOr(int $precedence): Context\LogicOrContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\LogicOrContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 76;
			$this->enterRecursionRule($localContext, 76, self::RULE_logicOr, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\OrSimpleContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(402);
				$this->recursiveLogicAnd(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(409);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 44, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\OrExprContext(new Context\LogicOrContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_logicOr);
						$this->setState(404);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(405);
						$this->match(self::OR);
						$this->setState(406);
						$this->recursiveLogicAnd(0); 
					}

					$this->setState(411);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 44, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function logicAnd(): Context\LogicAndContext
		{
			return $this->recursiveLogicAnd(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveLogicAnd(int $precedence): Context\LogicAndContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\LogicAndContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 78;
			$this->enterRecursionRule($localContext, 78, self::RULE_logicAnd, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\AndSimpleContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(413);
				$this->recursiveExpression_rational(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(420);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 45, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\AndExprContext(new Context\LogicAndContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_logicAnd);
						$this->setState(415);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(416);
						$this->match(self::AND);
						$this->setState(417);
						$this->recursiveExpression_rational(0); 
					}

					$this->setState(422);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 45, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression_rational(): Context\Expression_rationalContext
		{
			return $this->recursiveExpression_rational(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression_rational(int $precedence): Context\Expression_rationalContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\Expression_rationalContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 80;
			$this->enterRecursionRule($localContext, 80, self::RULE_expression_rational, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\RatSimpleContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(424);
				$this->recursiveExpression_arithmetic(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(431);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 46, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\RatExprContext(new Context\Expression_rationalContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_expression_rational);
						$this->setState(426);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(427);

						$_la = $this->input->LA(1);

						if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 4032) !== 0))) {
						$this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(428);
						$this->recursiveExpression_arithmetic(0); 
					}

					$this->setState(433);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 46, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function expression_arithmetic(): Context\Expression_arithmeticContext
		{
			return $this->recursiveExpression_arithmetic(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveExpression_arithmetic(int $precedence): Context\Expression_arithmeticContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\Expression_arithmeticContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 82;
			$this->enterRecursionRule($localContext, 82, self::RULE_expression_arithmetic, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\AddSubSimpleContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(435);
				$this->recursiveTerm(0);
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(442);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\AddSubExprContext(new Context\Expression_arithmeticContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_expression_arithmetic);
						$this->setState(437);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(438);

						$_la = $this->input->LA(1);

						if (!($_la === self::PLUS || $_la === self::MINUS)) {
						$this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(439);
						$this->recursiveTerm(0); 
					}

					$this->setState(444);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 47, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function term(): Context\TermContext
		{
			return $this->recursiveTerm(0);
		}

		/**
		 * @throws RecognitionException
		 */
		private function recursiveTerm(int $precedence): Context\TermContext
		{
			$parentContext = $this->ctx;
			$parentState = $this->getState();
			$localContext = new Context\TermContext($this->ctx, $parentState);
			$previousContext = $localContext;
			$startState = 84;
			$this->enterRecursionRule($localContext, 84, self::RULE_term, $precedence);

			try {
				$this->enterOuterAlt($localContext, 1);
				$localContext = new Context\TermSimpleContext($localContext);
				$this->ctx = $localContext;
				$previousContext = $localContext;

				$this->setState(446);
				$this->factor();
				$this->ctx->stop = $this->input->LT(-1);
				$this->setState(453);
				$this->errorHandler->sync($this);

				$alt = $this->getInterpreter()->adaptivePredict($this->input, 48, $this->ctx);

				while ($alt !== 2 && $alt !== ATN::INVALID_ALT_NUMBER) {
					if ($alt === 1) {
						if ($this->getParseListeners() !== null) {
						    $this->triggerExitRuleEvent();
						}

						$previousContext = $localContext;
						$localContext = new Context\MultDivModExprContext(new Context\TermContext($parentContext, $parentState));
						$this->pushNewRecursionContext($localContext, $startState, self::RULE_term);
						$this->setState(448);

						if (!($this->precpred($this->ctx, 2))) {
						    throw new FailedPredicateException($this, "\\\$this->precpred(\\\$this->ctx, 2)");
						}
						$this->setState(449);

						$_la = $this->input->LA(1);

						if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 114688) !== 0))) {
						$this->errorHandler->recoverInline($this);
						} else {
							if ($this->input->LA(1) === Token::EOF) {
							    $this->matchedEOF = true;
						    }

							$this->errorHandler->reportMatch($this);
							$this->consume();
						}
						$this->setState(450);
						$this->factor(); 
					}

					$this->setState(455);
					$this->errorHandler->sync($this);

					$alt = $this->getInterpreter()->adaptivePredict($this->input, 48, $this->ctx);
				}
			} catch (RecognitionException $exception) {
				$localContext->exception = $exception;
				$this->errorHandler->reportError($this, $exception);
				$this->errorHandler->recover($this, $exception);
			} finally {
				$this->unrollRecursionContexts($parentContext);
			}

			return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function factor(): Context\FactorContext
		{
		    $localContext = new Context\FactorContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 86, self::RULE_factor);

		    try {
		        $this->setState(492);
		        $this->errorHandler->sync($this);

		        switch ($this->getInterpreter()->adaptivePredict($this->input, 49, $this->ctx)) {
		        	case 1:
		        	    $localContext = new Context\ParExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 1);
		        	    $this->setState(456);
		        	    $this->match(self::PAR_OPEN);
		        	    $this->setState(457);
		        	    $this->expression();
		        	    $this->setState(458);
		        	    $this->match(self::PAR_CLOSE);
		        	break;

		        	case 2:
		        	    $localContext = new Context\UnaryPlusContext($localContext);
		        	    $this->enterOuterAlt($localContext, 2);
		        	    $this->setState(460);
		        	    $this->match(self::PLUS);
		        	    $this->setState(461);
		        	    $this->factor();
		        	break;

		        	case 3:
		        	    $localContext = new Context\UnaryMinusContext($localContext);
		        	    $this->enterOuterAlt($localContext, 3);
		        	    $this->setState(462);
		        	    $this->match(self::MINUS);
		        	    $this->setState(463);
		        	    $this->factor();
		        	break;

		        	case 4:
		        	    $localContext = new Context\ReferenceExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 4);
		        	    $this->setState(464);
		        	    $this->match(self::AMPERSAND);
		        	    $this->setState(465);
		        	    $this->factor();
		        	break;

		        	case 5:
		        	    $localContext = new Context\DefereceExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 5);
		        	    $this->setState(466);
		        	    $this->match(self::MULT);
		        	    $this->setState(467);
		        	    $this->factor();
		        	break;

		        	case 6:
		        	    $localContext = new Context\UnaryNotContext($localContext);
		        	    $this->enterOuterAlt($localContext, 6);
		        	    $this->setState(468);
		        	    $this->match(self::NOT);
		        	    $this->setState(469);
		        	    $this->factor();
		        	break;

		        	case 7:
		        	    $localContext = new Context\LiteralExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 7);
		        	    $this->setState(470);
		        	    $this->literal();
		        	break;

		        	case 8:
		        	    $localContext = new Context\NowExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 8);
		        	    $this->setState(471);
		        	    $this->match(self::NOW);
		        	    $this->setState(472);
		        	    $this->match(self::PAR_OPEN);
		        	    $this->setState(473);
		        	    $this->match(self::PAR_CLOSE);
		        	break;

		        	case 9:
		        	    $localContext = new Context\SubstrExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 9);
		        	    $this->setState(474);
		        	    $this->match(self::SUBSTR);
		        	    $this->setState(475);
		        	    $this->match(self::PAR_OPEN);
		        	    $this->setState(476);
		        	    $this->exprList();
		        	    $this->setState(477);
		        	    $this->match(self::PAR_CLOSE);
		        	break;

		        	case 10:
		        	    $localContext = new Context\TypeOfExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 10);
		        	    $this->setState(479);
		        	    $this->match(self::TYPEOF);
		        	    $this->setState(480);
		        	    $this->match(self::PAR_OPEN);
		        	    $this->setState(481);
		        	    $this->expression();
		        	    $this->setState(482);
		        	    $this->match(self::PAR_CLOSE);
		        	break;

		        	case 11:
		        	    $localContext = new Context\LenStmContext($localContext);
		        	    $this->enterOuterAlt($localContext, 11);
		        	    $this->setState(484);
		        	    $this->match(self::LEN);
		        	    $this->setState(485);
		        	    $this->match(self::PAR_OPEN);
		        	    $this->setState(486);
		        	    $this->expression();
		        	    $this->setState(487);
		        	    $this->match(self::PAR_CLOSE);
		        	break;

		        	case 12:
		        	    $localContext = new Context\CallExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 12);
		        	    $this->setState(489);
		        	    $this->funcAccess();
		        	break;

		        	case 13:
		        	    $localContext = new Context\ArrayAccessExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 13);
		        	    $this->setState(490);
		        	    $this->arrayAccess();
		        	break;

		        	case 14:
		        	    $localContext = new Context\IdExprContext($localContext);
		        	    $this->enterOuterAlt($localContext, 14);
		        	    $this->setState(491);
		        	    $this->match(self::ID);
		        	break;
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function literal(): Context\LiteralContext
		{
		    $localContext = new Context\LiteralContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 88, self::RULE_literal);

		    try {
		        $this->setState(496);
		        $this->errorHandler->sync($this);

		        switch ($this->input->LA(1)) {
		            case self::TRUE:
		            case self::FALSE:
		            case self::NIL:
		            case self::STRING:
		            case self::CHAR:
		            case self::INT:
		            case self::FLOAT:
		            	$this->enterOuterAlt($localContext, 1);
		            	$this->setState(494);

		            	$_la = $this->input->LA(1);

		            	if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 3891110079122243584) !== 0))) {
		            	$this->errorHandler->recoverInline($this);
		            	} else {
		            		if ($this->input->LA(1) === Token::EOF) {
		            		    $this->matchedEOF = true;
		            	    }

		            		$this->errorHandler->reportMatch($this);
		            		$this->consume();
		            	}
		            	break;

		            case self::CLASP_OPEN:
		            	$this->enterOuterAlt($localContext, 2);
		            	$this->setState(495);
		            	$this->arrayLiteral();
		            	break;

		        default:
		        	throw new NoViableAltException($this);
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		/**
		 * @throws RecognitionException
		 */
		public function typesStatics(): Context\TypesStaticsContext
		{
		    $localContext = new Context\TypesStaticsContext($this->ctx, $this->getState());

		    $this->enterRule($localContext, 90, self::RULE_typesStatics);

		    try {
		        $this->enterOuterAlt($localContext, 1);
		        $this->setState(498);

		        $_la = $this->input->LA(1);

		        if (!(((($_la) & ~0x3f) === 0 && ((1 << $_la) & 16252928) !== 0))) {
		        $this->errorHandler->recoverInline($this);
		        } else {
		        	if ($this->input->LA(1) === Token::EOF) {
		        	    $this->matchedEOF = true;
		            }

		        	$this->errorHandler->reportMatch($this);
		        	$this->consume();
		        }
		    } catch (RecognitionException $exception) {
		        $localContext->exception = $exception;
		        $this->errorHandler->reportError($this, $exception);
		        $this->errorHandler->recover($this, $exception);
		    } finally {
		        $this->exitRule();
		    }

		    return $localContext;
		}

		public function sempred(?RuleContext $localContext, int $ruleIndex, int $predicateIndex): bool
		{
			switch ($ruleIndex) {
					case 38:
						return $this->sempredLogicOr($localContext, $predicateIndex);

					case 39:
						return $this->sempredLogicAnd($localContext, $predicateIndex);

					case 40:
						return $this->sempredExpression_rational($localContext, $predicateIndex);

					case 41:
						return $this->sempredExpression_arithmetic($localContext, $predicateIndex);

					case 42:
						return $this->sempredTerm($localContext, $predicateIndex);

				default:
					return true;
				}
		}

		private function sempredLogicOr(?Context\LogicOrContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 0:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredLogicAnd(?Context\LogicAndContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 1:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredExpression_rational(?Context\Expression_rationalContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 2:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredExpression_arithmetic(?Context\Expression_arithmeticContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 3:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}

		private function sempredTerm(?Context\TermContext $localContext, int $predicateIndex): bool
		{
			switch ($predicateIndex) {
			    case 4:
			        return $this->precpred($this->ctx, 2);
			}

			return true;
		}
	}
}

namespace Context {
	use Antlr\Antlr4\Runtime\ParserRuleContext;
	use Antlr\Antlr4\Runtime\Token;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeVisitor;
	use Antlr\Antlr4\Runtime\Tree\TerminalNode;
	use Antlr\Antlr4\Runtime\Tree\ParseTreeListener;
	use GrammarParser;
	use GrammarVisitor;
	use GrammarListener;

	class ProgramContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_program;
	    }

	    public function EOF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EOF, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterProgram($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitProgram($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitProgram($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class StatementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_statement;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AssignStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function assignStmt(): ?AssignStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignStmtContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAssignStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAssignStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAssignStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class BlockStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBlockStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBlockStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBlockStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ContinueStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function continue_stmt(): ?Continue_stmtContext
	    {
	    	return $this->getTypedRuleContext(Continue_stmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterContinueStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitContinueStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitContinueStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CallStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcAccess(): ?FuncAccessContext
	    {
	    	return $this->getTypedRuleContext(FuncAccessContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterCallStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitCallStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitCallStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function forStmt(): ?ForStmtContext
	    {
	    	return $this->getTypedRuleContext(ForStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ReturnStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function return_stmt(): ?Return_stmtContext
	    {
	    	return $this->getTypedRuleContext(Return_stmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterReturnStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitReturnStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitReturnStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class PrintStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function printStmt(): ?PrintStmtContext
	    {
	    	return $this->getTypedRuleContext(PrintStmtContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterPrintStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitPrintStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitPrintStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ConstStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function constStmt(): ?ConstStmtContext
	    {
	    	return $this->getTypedRuleContext(ConstStmtContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterConstStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitConstStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitConstStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class FunctionStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcStmt(): ?FuncStmtContext
	    {
	    	return $this->getTypedRuleContext(FuncStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFunctionStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFunctionStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFunctionStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayAssingStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayAssign(): ?ArrayAssignContext
	    {
	    	return $this->getTypedRuleContext(ArrayAssignContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayAssingStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayAssingStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayAssingStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SwitchStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function switchStmt(): ?SwitchStmtContext
	    {
	    	return $this->getTypedRuleContext(SwitchStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSwitchStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSwitchStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSwitchStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IncrementStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function increment(): ?IncrementContext
	    {
	    	return $this->getTypedRuleContext(IncrementContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIncrementStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIncrementStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIncrementStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IfStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ifStmt(): ?IfStmtContext
	    {
	    	return $this->getTypedRuleContext(IfStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIfStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIfStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIfStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class BreakStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function break_stmt(): ?Break_stmtContext
	    {
	    	return $this->getTypedRuleContext(Break_stmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBreakStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBreakStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBreakStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DeclStmtContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function declareStmt(): ?DeclareStmtContext
	    {
	    	return $this->getTypedRuleContext(DeclareStmtContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDeclStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDeclStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDeclStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class DecrementStmContext extends StatementContext
	{
		public function __construct(StatementContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function decrement(): ?DecrementContext
	    {
	    	return $this->getTypedRuleContext(DecrementContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDecrementStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDecrementStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDecrementStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class BlockContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_block;
	    }

	    public function KEY_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_OPEN, 0);
	    }

	    public function KEY_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_CLOSE, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBlock($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBlock($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBlock($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class PrintStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_printStmt;
	    }

	    public function FMT_PRINT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FMT_PRINT, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterPrintStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitPrintStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitPrintStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DeclareStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_declareStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class VarDeclContext extends DeclareStmtContext
	{
		public function __construct(DeclareStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function VAR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::VAR, 0);
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EQUAL, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterVarDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitVarDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitVarDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ShortDeclContext extends DeclareStmtContext
	{
		public function __construct(DeclareStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function COLON_EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON_EQUAL, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterShortDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitShortDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitShortDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ConstStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_constStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ConstDeclContext extends ConstStmtContext
	{
		public function __construct(ConstStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function CONST(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CONST, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    public function typesStatics(): ?TypesStaticsContext
	    {
	    	return $this->getTypedRuleContext(TypesStaticsContext::class, 0);
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EQUAL, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterConstDecl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitConstDecl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitConstDecl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IdListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_idList;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function ID(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::ID);
	    	}

	        return $this->getToken(GrammarParser::ID, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIdList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIdList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIdList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssignStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_assignStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AssingmentContext extends AssignStmtContext
	{
		public function __construct(AssignStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function assingExp(): ?AssingExpContext
	    {
	    	return $this->getTypedRuleContext(AssingExpContext::class, 0);
	    }

	    public function typeAssing(): ?TypeAssingContext
	    {
	    	return $this->getTypedRuleContext(TypeAssingContext::class, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAssingment($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAssingment($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAssingment($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class AssingExpContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_assingExp;
	    }

	    public function arrayAccess(): ?ArrayAccessContext
	    {
	    	return $this->getTypedRuleContext(ArrayAccessContext::class, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAssingExp($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAssingExp($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAssingExp($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeAssingContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_typeAssing;
	    }

	    public function EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EQUAL, 0);
	    }

	    public function ADD_ASSING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ADD_ASSING, 0);
	    }

	    public function SUB_ASSING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SUB_ASSING, 0);
	    }

	    public function MULT_ASSING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT_ASSING, 0);
	    }

	    public function DIV_ASSING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DIV_ASSING, 0);
	    }

	    public function MOD_ASSING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MOD_ASSING, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypeAssing($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypeAssing($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypeAssing($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IfStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_ifStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class IfDclContext extends IfStmtContext
	{
		public function __construct(IfStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function IF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::IF, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    /**
	     * @return array<BlockContext>|BlockContext|null
	     */
	    public function block(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(BlockContext::class);
	    	}

	        return $this->getTypedRuleContext(BlockContext::class, $index);
	    }

	    public function declareStmt(): ?DeclareStmtContext
	    {
	    	return $this->getTypedRuleContext(DeclareStmtContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

	    public function ELSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ELSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIfDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIfDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIfDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_switchStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class SwitchDclContext extends SwitchStmtContext
	{
		public function __construct(SwitchStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function SWITCH(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SWITCH, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function KEY_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_OPEN, 0);
	    }

	    public function KEY_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_CLOSE, 0);
	    }

	    /**
	     * @return array<SwitchCaseContext>|SwitchCaseContext|null
	     */
	    public function switchCase(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(SwitchCaseContext::class);
	    	}

	        return $this->getTypedRuleContext(SwitchCaseContext::class, $index);
	    }

	    public function caseDefault(): ?CaseDefaultContext
	    {
	    	return $this->getTypedRuleContext(CaseDefaultContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSwitchDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSwitchDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSwitchDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class SwitchCaseContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_switchCase;
	    }

	    public function CASE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CASE, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSwitchCase($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSwitchCase($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSwitchCase($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class CaseDefaultContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_caseDefault;
	    }

	    public function DEFAULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DEFAULT, 0);
	    }

	    public function COLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COLON, 0);
	    }

	    /**
	     * @return array<StatementContext>|StatementContext|null
	     */
	    public function statement(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(StatementContext::class);
	    	}

	        return $this->getTypedRuleContext(StatementContext::class, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterCaseDefault($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitCaseDefault($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitCaseDefault($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_forStmt;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class ForDcl1Context extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FOR, 0);
	    }

	    public function for_init(): ?For_initContext
	    {
	    	return $this->getTypedRuleContext(For_initContext::class, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function SEMICOLON(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::SEMICOLON);
	    	}

	        return $this->getToken(GrammarParser::SEMICOLON, $index);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function forupdate(): ?ForupdateContext
	    {
	    	return $this->getTypedRuleContext(ForupdateContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForDcl1($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForDcl1($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForDcl1($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForDcl3Context extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FOR, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForDcl3($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForDcl3($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForDcl3($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ForDcl2Context extends ForStmtContext
	{
		public function __construct(ForStmtContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function FOR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FOR, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForDcl2($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForDcl2($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForDcl2($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class For_initContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_for_init;
	    }

	    public function declareStmt(): ?DeclareStmtContext
	    {
	    	return $this->getTypedRuleContext(DeclareStmtContext::class, 0);
	    }

	    public function assignStmt(): ?AssignStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFor_init($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFor_init($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFor_init($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Break_stmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_break_stmt;
	    }

	    public function BREAK(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::BREAK, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterBreak_stmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitBreak_stmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitBreak_stmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Continue_stmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_continue_stmt;
	    }

	    public function CONTINUE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CONTINUE, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterContinue_stmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitContinue_stmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitContinue_stmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Return_stmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_return_stmt;
	    }

	    public function RETURN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::RETURN, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterReturn_stmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitReturn_stmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitReturn_stmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAssignContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayAssign;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AsingArrayContext extends ArrayAssignContext
	{
		public function __construct(ArrayAssignContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    public function arrayDimension(): ?ArrayDimensionContext
	    {
	    	return $this->getTypedRuleContext(ArrayDimensionContext::class, 0);
	    }

	    public function typeAssing(): ?TypeAssingContext
	    {
	    	return $this->getTypedRuleContext(TypeAssingContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function SEMICOLON(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SEMICOLON, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAsingArray($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAsingArray($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAsingArray($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayDimensionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayDimension;
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function CLASP_OPEN(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::CLASP_OPEN);
	    	}

	        return $this->getToken(GrammarParser::CLASP_OPEN, $index);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function CLASP_CLOSE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::CLASP_CLOSE);
	    	}

	        return $this->getToken(GrammarParser::CLASP_CLOSE, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayDimension($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayDimension($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayDimension($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayLiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayLiteral;
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

	    public function arrayContent(): ?ArrayContentContext
	    {
	    	return $this->getTypedRuleContext(ArrayContentContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayContentContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayContent;
	    }

	    public function KEY_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_OPEN, 0);
	    }

	    public function arrayValues(): ?ArrayValuesContext
	    {
	    	return $this->getTypedRuleContext(ArrayValuesContext::class, 0);
	    }

	    public function KEY_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::KEY_CLOSE, 0);
	    }

	    public function COMMA(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::COMMA, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayContent($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayContent($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayContent($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayValuesContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayValues;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<ArrayContentContext>|ArrayContentContext|null
	     */
	    public function arrayContent(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ArrayContentContext::class);
	    	}

	        return $this->getTypedRuleContext(ArrayContentContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayValues($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayValues($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayValues($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayAccessContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayAccess;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function CLASP_OPEN(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::CLASP_OPEN);
	    	}

	        return $this->getToken(GrammarParser::CLASP_OPEN, $index);
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function CLASP_CLOSE(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::CLASP_CLOSE);
	    	}

	        return $this->getToken(GrammarParser::CLASP_CLOSE, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayAccess($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayAccess($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayAccess($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ForupdateContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_forupdate;
	    }

	    public function increment(): ?IncrementContext
	    {
	    	return $this->getTypedRuleContext(IncrementContext::class, 0);
	    }

	    public function decrement(): ?DecrementContext
	    {
	    	return $this->getTypedRuleContext(DecrementContext::class, 0);
	    }

	    public function assignStmt(): ?AssignStmtContext
	    {
	    	return $this->getTypedRuleContext(AssignStmtContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterForupdate($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitForupdate($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitForupdate($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class IncrementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_increment;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function PLUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::PLUS);
	    	}

	        return $this->getToken(GrammarParser::PLUS, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIncrement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIncrement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIncrement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class DecrementContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_decrement;
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function MINUS(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::MINUS);
	    	}

	        return $this->getToken(GrammarParser::MINUS, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDecrement($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDecrement($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDecrement($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncStmtContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcStmt;
	    }

	    public function FUNC(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FUNC, 0);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    public function funcParRet(): ?FuncParRetContext
	    {
	    	return $this->getTypedRuleContext(FuncParRetContext::class, 0);
	    }

	    public function block(): ?BlockContext
	    {
	    	return $this->getTypedRuleContext(BlockContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncStmt($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncStmt($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncStmt($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncParRetContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcParRet;
	    }

	    public function parameters(): ?ParametersContext
	    {
	    	return $this->getTypedRuleContext(ParametersContext::class, 0);
	    }

	    public function result(): ?ResultContext
	    {
	    	return $this->getTypedRuleContext(ResultContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncParRet($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncParRet($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncParRet($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParametersContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_parameters;
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

	    /**
	     * @return array<ParamDclContext>|ParamDclContext|null
	     */
	    public function paramDcl(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ParamDclContext::class);
	    	}

	        return $this->getTypedRuleContext(ParamDclContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterParameters($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitParameters($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitParameters($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ParamDclContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_paramDcl;
	    }

	    public function idList(): ?IdListContext
	    {
	    	return $this->getTypedRuleContext(IdListContext::class, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterParamDcl($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitParamDcl($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitParamDcl($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ResultContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_result;
	    }

	    /**
	     * @return array<TypeContext>|TypeContext|null
	     */
	    public function type(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(TypeContext::class);
	    	}

	        return $this->getTypedRuleContext(TypeContext::class, $index);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterResult($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitResult($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitResult($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FuncAccessContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_funcAccess;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class FuncCallExprContext extends FuncAccessContext
	{
		public function __construct(FuncAccessContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterFuncCallExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitFuncCallExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitFuncCallExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_type;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class TypePointerContext extends TypeContext
	{
		public function __construct(TypeContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypePointer($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypePointer($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypePointer($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TypeArrayDefContext extends TypeContext
	{
		public function __construct(TypeContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayType(): ?ArrayTypeContext
	    {
	    	return $this->getTypedRuleContext(ArrayTypeContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypeArrayDef($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypeArrayDef($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypeArrayDef($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TypePrimitiveContext extends TypeContext
	{
		public function __construct(TypeContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function typesStatics(): ?TypesStaticsContext
	    {
	    	return $this->getTypedRuleContext(TypesStaticsContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypePrimitive($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypePrimitive($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypePrimitive($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ArrayTypeContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_arrayType;
	    }

	    public function CLASP_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CLASP_OPEN, 0);
	    }

	    public function CLASP_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CLASP_CLOSE, 0);
	    }

	    public function type(): ?TypeContext
	    {
	    	return $this->getTypedRuleContext(TypeContext::class, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayType($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayType($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayType($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExprListContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_exprList;
	    }

	    /**
	     * @return array<ExpressionContext>|ExpressionContext|null
	     */
	    public function expression(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTypedRuleContexts(ExpressionContext::class);
	    	}

	        return $this->getTypedRuleContext(ExpressionContext::class, $index);
	    }

	    /**
	     * @return array<TerminalNode>|TerminalNode|null
	     */
	    public function COMMA(?int $index = null)
	    {
	    	if ($index === null) {
	    		return $this->getTokens(GrammarParser::COMMA);
	    	}

	        return $this->getToken(GrammarParser::COMMA, $index);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterExprList($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitExprList($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitExprList($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class ExpressionContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_expression;
	    }

	    public function logicOr(): ?LogicOrContext
	    {
	    	return $this->getTypedRuleContext(LogicOrContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterExpression($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitExpression($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitExpression($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicOrContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_logicOr;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class OrSimpleContext extends LogicOrContext
	{
		public function __construct(LogicOrContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function logicAnd(): ?LogicAndContext
	    {
	    	return $this->getTypedRuleContext(LogicAndContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterOrSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitOrSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitOrSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class OrExprContext extends LogicOrContext
	{
		public function __construct(LogicOrContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function logicOr(): ?LogicOrContext
	    {
	    	return $this->getTypedRuleContext(LogicOrContext::class, 0);
	    }

	    public function OR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::OR, 0);
	    }

	    public function logicAnd(): ?LogicAndContext
	    {
	    	return $this->getTypedRuleContext(LogicAndContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterOrExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitOrExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitOrExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LogicAndContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_logicAnd;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AndExprContext extends LogicAndContext
	{
		public function __construct(LogicAndContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function logicAnd(): ?LogicAndContext
	    {
	    	return $this->getTypedRuleContext(LogicAndContext::class, 0);
	    }

	    public function AND(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::AND, 0);
	    }

	    public function expression_rational(): ?Expression_rationalContext
	    {
	    	return $this->getTypedRuleContext(Expression_rationalContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAndExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAndExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAndExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AndSimpleContext extends LogicAndContext
	{
		public function __construct(LogicAndContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression_rational(): ?Expression_rationalContext
	    {
	    	return $this->getTypedRuleContext(Expression_rationalContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAndSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAndSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAndSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Expression_rationalContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_expression_rational;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class RatExprContext extends Expression_rationalContext
	{
		public function __construct(Expression_rationalContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression_rational(): ?Expression_rationalContext
	    {
	    	return $this->getTypedRuleContext(Expression_rationalContext::class, 0);
	    }

	    public function expression_arithmetic(): ?Expression_arithmeticContext
	    {
	    	return $this->getTypedRuleContext(Expression_arithmeticContext::class, 0);
	    }

	    public function EQUALITY(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::EQUALITY, 0);
	    }

	    public function INEQUALITY(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::INEQUALITY, 0);
	    }

	    public function GREATER(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::GREATER, 0);
	    }

	    public function LESS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LESS, 0);
	    }

	    public function GREATER_EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::GREATER_EQUAL, 0);
	    }

	    public function LESS_EQUAL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LESS_EQUAL, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterRatExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitRatExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitRatExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class RatSimpleContext extends Expression_rationalContext
	{
		public function __construct(Expression_rationalContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression_arithmetic(): ?Expression_arithmeticContext
	    {
	    	return $this->getTypedRuleContext(Expression_arithmeticContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterRatSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitRatSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitRatSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class Expression_arithmeticContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_expression_arithmetic;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class AddSubSimpleContext extends Expression_arithmeticContext
	{
		public function __construct(Expression_arithmeticContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAddSubSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAddSubSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAddSubSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class AddSubExprContext extends Expression_arithmeticContext
	{
		public function __construct(Expression_arithmeticContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function expression_arithmetic(): ?Expression_arithmeticContext
	    {
	    	return $this->getTypedRuleContext(Expression_arithmeticContext::class, 0);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

	    public function PLUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PLUS, 0);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MINUS, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterAddSubExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitAddSubExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitAddSubExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TermContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_term;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class MultDivModExprContext extends TermContext
	{
		public function __construct(TermContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function term(): ?TermContext
	    {
	    	return $this->getTypedRuleContext(TermContext::class, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function DIV(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::DIV, 0);
	    }

	    public function MOD(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MOD, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterMultDivModExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitMultDivModExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitMultDivModExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TermSimpleContext extends TermContext
	{
		public function __construct(TermContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTermSimple($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTermSimple($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTermSimple($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class FactorContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_factor;
	    }
	 
		public function copyFrom(ParserRuleContext $context): void
		{
			parent::copyFrom($context);

		}
	}

	class DefereceExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function MULT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MULT, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterDefereceExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitDefereceExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitDefereceExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ReferenceExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function AMPERSAND(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::AMPERSAND, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterReferenceExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitReferenceExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitReferenceExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class IdExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function ID(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::ID, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterIdExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitIdExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitIdExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LenStmContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function LEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::LEN, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLenStm($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLenStm($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLenStm($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ArrayAccessExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function arrayAccess(): ?ArrayAccessContext
	    {
	    	return $this->getTypedRuleContext(ArrayAccessContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterArrayAccessExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitArrayAccessExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitArrayAccessExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryPlusContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function PLUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PLUS, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterUnaryPlus($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitUnaryPlus($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitUnaryPlus($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryMinusContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function MINUS(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::MINUS, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterUnaryMinus($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitUnaryMinus($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitUnaryMinus($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class TypeOfExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function TYPEOF(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::TYPEOF, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypeOfExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypeOfExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypeOfExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class UnaryNotContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NOT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NOT, 0);
	    }

	    public function factor(): ?FactorContext
	    {
	    	return $this->getTypedRuleContext(FactorContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterUnaryNot($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitUnaryNot($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitUnaryNot($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class NowExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function NOW(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NOW, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterNowExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitNowExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitNowExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class ParExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function expression(): ?ExpressionContext
	    {
	    	return $this->getTypedRuleContext(ExpressionContext::class, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterParExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitParExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitParExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class SubstrExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function SUBSTR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::SUBSTR, 0);
	    }

	    public function PAR_OPEN(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_OPEN, 0);
	    }

	    public function exprList(): ?ExprListContext
	    {
	    	return $this->getTypedRuleContext(ExprListContext::class, 0);
	    }

	    public function PAR_CLOSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::PAR_CLOSE, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterSubstrExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitSubstrExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitSubstrExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class LiteralExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function literal(): ?LiteralContext
	    {
	    	return $this->getTypedRuleContext(LiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLiteralExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLiteralExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLiteralExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	}

	class CallExprContext extends FactorContext
	{
		public function __construct(FactorContext $context)
		{
		    parent::__construct($context);

		    $this->copyFrom($context);
	    }

	    public function funcAccess(): ?FuncAccessContext
	    {
	    	return $this->getTypedRuleContext(FuncAccessContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterCallExpr($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitCallExpr($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitCallExpr($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class LiteralContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_literal;
	    }

	    public function INT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::INT, 0);
	    }

	    public function FLOAT(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FLOAT, 0);
	    }

	    public function STRING(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::STRING, 0);
	    }

	    public function CHAR(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CHAR, 0);
	    }

	    public function TRUE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::TRUE, 0);
	    }

	    public function FALSE(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FALSE, 0);
	    }

	    public function NIL(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::NIL, 0);
	    }

	    public function arrayLiteral(): ?ArrayLiteralContext
	    {
	    	return $this->getTypedRuleContext(ArrayLiteralContext::class, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterLiteral($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitLiteral($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitLiteral($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 

	class TypesStaticsContext extends ParserRuleContext
	{
		public function __construct(?ParserRuleContext $parent, ?int $invokingState = null)
		{
			parent::__construct($parent, $invokingState);
		}

		public function getRuleIndex(): int
		{
		    return GrammarParser::RULE_typesStatics;
	    }

	    public function INT_R(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::INT_R, 0);
	    }

	    public function FLOAT_R(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::FLOAT_R, 0);
	    }

	    public function BOOL_R(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::BOOL_R, 0);
	    }

	    public function CHAR_R(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::CHAR_R, 0);
	    }

	    public function STRING_R(): ?TerminalNode
	    {
	        return $this->getToken(GrammarParser::STRING_R, 0);
	    }

		public function enterRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->enterTypesStatics($this);
		    }
		}

		public function exitRule(ParseTreeListener $listener): void
		{
			if ($listener instanceof GrammarListener) {
			    $listener->exitTypesStatics($this);
		    }
		}

		public function accept(ParseTreeVisitor $visitor): mixed
		{
			if ($visitor instanceof GrammarVisitor) {
			    return $visitor->visitTypesStatics($this);
		    }

			return $visitor->visitChildren($this);
		}
	} 
}