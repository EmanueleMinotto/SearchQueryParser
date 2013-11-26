<?php

namespace EmanueleMinotto\SearchQueryParser\Operand;

use EmanueleMinotto\SearchQueryParser\Exception\SyntaxErrorException;
use EmanueleMinotto\SearchQueryParser\Lexer;
use EmanueleMinotto\SearchQueryParser\TokenStream;
use EmanueleMinotto\SearchQueryParser\Grammar;
use EmanueleMinotto\SearchQueryParser\Parser;
use EmanueleMinotto\SearchQueryParser\OperandInterface;

/**
 * Operand which parses expressions between parentheses
 */
class ParenthesesOperand implements OperandInterface
{
    /**
     * Returns the identifiers for this operand.
     *
     * @return array The identifiers for this operand.
     */
    public function getIdentifiers()
    {
        return array(
            Lexer::T_OPEN_PARENTHESIS,
        );
    }

    /**
     * Parse the operand
     *
     * @param  Grammar     $grammar The grammar of the parser
     * @param  TokenStream $stream  The token stream to parse
     * @return Node        The node between the parentheses
     */
    public function parse(Grammar $grammar, TokenStream $stream)
    {
        $stream->next();

        $parser = new Parser($grammar);
        $node = $parser->parse($stream);

        $stream->expect(array(Lexer::T_CLOSE_PARENTHESIS), function (Token $current = null) {
            // Thrown if an unexpected token was found
            throw new SyntaxErrorException($current
                ? 'Expected `)`; got `' . $current->getValue() . '}`'
                : 'Expected `)` but end of stream reached'
            );
        });

        return $node;
    }
}
