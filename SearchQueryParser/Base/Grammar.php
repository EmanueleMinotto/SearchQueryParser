<?php

namespace EmanueleMinotto\SearchQueryParser\Base;

use EmanueleMinotto\SearchQueryParser\Grammar as ParserGrammar;
use EmanueleMinotto\SearchQueryParser\Operator\BinaryOperator;
use EmanueleMinotto\SearchQueryParser\Operator\UnaryOperator;
use EmanueleMinotto\SearchQueryParser\Base\Node\UnaryPos;
use EmanueleMinotto\SearchQueryParser\Base\Node\UnaryNeg;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinaryAdd;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinarySub;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinaryMul;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinaryDiv;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinaryMod;
use EmanueleMinotto\SearchQueryParser\Base\Node\BinaryPower;

/**
 * The parser grammar for the example
 */
class Grammar extends ParserGrammar
{
    /**
     * Creates the grammar
     */
    public function __construct()
    {
        parent::__construct();

        $this->addOperator(new UnaryOperator(Lexer::T_PLUS, 5, function ($node) {
            return new UnaryPos($node);
        }));
        $this->addOperator(new UnaryOperator(Lexer::T_MINUS, 5, function ($node) {
            return new UnaryNeg($node);
        }));

        $this->addOperator(new BinaryOperator(Lexer::T_PLUS, 2, BinaryOperator::LEFT, function ($left, $right) {
            return new BinaryAdd($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_MINUS, 2, BinaryOperator::LEFT, function ($left, $right) {
            return new BinarySub($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_MUL, 3, BinaryOperator::LEFT, function ($left, $right) {
            return new BinaryMul($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_DIV, 3, BinaryOperator::LEFT, function ($left, $right) {
            return new BinaryDiv($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_MOD, 3, BinaryOperator::LEFT, function ($left, $right) {
            return new BinaryMod($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_POWER, 4, BinaryOperator::RIGHT, function ($left, $right) {
            return new BinaryPower($left, $right);
        }));
    }
}
