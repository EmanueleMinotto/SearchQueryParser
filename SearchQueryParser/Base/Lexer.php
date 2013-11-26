<?php

namespace EmanueleMinotto\SearchQueryParser\Base;

use EmanueleMinotto\SearchQueryParser\Token;
use EmanueleMinotto\SearchQueryParser\Lexer as ParserLexer;

/**
 * Tokenize an expression
 */
class Lexer extends ParserLexer
{
    /**
     * Expression tokens
     *
     * @var int
     */
    const T_PLUS              = 8;  // +
    const T_MINUS             = 9;  // -
    const T_MUL               = 10;  // *
    const T_DIV               = 11;  // /
    const T_MOD               = 12;  // %
    const T_POWER             = 13; // ^

    /**
     * Map the constant values with its token type
     *
     * @var int[]
     */
    protected $constTokens = array(
        '+' => self::T_PLUS,
        '-' => self::T_MINUS,
        '*' => self::T_MUL,
        '/' => self::T_DIV,
        '%' => self::T_MOD,
        '^' => self::T_POWER,
    );
}
