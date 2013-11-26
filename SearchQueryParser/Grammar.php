<?php

namespace EmanueleMinotto\SearchQueryParser;

use EmanueleMinotto\SearchQueryParser\Operator\UnaryOperator;
use EmanueleMinotto\SearchQueryParser\Operator\BinaryOperator;
use EmanueleMinotto\SearchQueryParser\Node\LogicalNeg;
use EmanueleMinotto\SearchQueryParser\Node\LogicalAnd;
use EmanueleMinotto\SearchQueryParser\Node\LogicalOr;

/**
 * Parser grammar for the query
 */
class Grammar extends AbstractGrammar
{
    /**
     * Creates the grammar
     */
    public function __construct()
    {
        parent::__construct();

        $this->addOperator(new UnaryOperator(Lexer::T_NOT, 10, function ($node) {
            return new LogicalNeg($node);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_AND, 9, BinaryOperator::LEFT, function ($left, $right) {
            return new LogicalAnd($left, $right);
        }));
        $this->addOperator(new BinaryOperator(Lexer::T_OR, 9, BinaryOperator::LEFT, function ($left, $right) {
            return new LogicalOr($left, $right);
        }));
    }
}
