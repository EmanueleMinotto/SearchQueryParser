<?php

namespace EmanueleMinotto\SearchQueryParser\Operand;

use EmanueleMinotto\SearchQueryParser\OperandInterface;
use EmanueleMinotto\SearchQueryParser\Node\Operand;
use EmanueleMinotto\SearchQueryParser\Lexer;
use EmanueleMinotto\SearchQueryParser\TokenStream;
use EmanueleMinotto\SearchQueryParser\Grammar;

/**
 * Operand which parses integer and floating-point values
 */
class StringOperand implements OperandInterface
{
    /**
     * Returns the identifiers for this operand
     *
     * @return array
     */
    public function getIdentifiers()
    {
        return array(
            Lexer::T_STRING,
        );
    }

    /**
     * Parse the operand
     *
     * @param  Grammar     $grammar The grammar of the parser
     * @param  TokenStream $stream  The token stream to parse
     * @return Operand     The operand node
     */
    public function parse(Grammar $grammar, TokenStream $stream)
    {
        $token = $stream->current();
        $node = new Operand($token->getValue());

        return $node;
    }
}
