<?php

namespace EmanueleMinotto\SearchQueryParser;

use EmanueleMinotto\SearchQueryParser\Exception\DoubleIdentifierUsageException;
use EmanueleMinotto\SearchQueryParser\Exception\InvalidIdentifierException;

/**
 * Contains a list of operands
 */
class Operands
{
    /**
     * The list with registered operands
     *
     * @var Operand[]
     */
    private $operands = array();

    /**
     * Adds a new operand to the table
     *
     * @param Operand $operand
     */
    public function addOperand(OperandInterface $operand)
    {
        foreach ($operand->getIdentifiers() as $identifier) {
            if (isset($this->operands[$identifier])) {
                // Thrown if an identifier of the given operand is registered for an other operand
                throw new DoubleIdentifierUsageException('The identifier `' . $identifier . '` is already in use for operand `' . get_class($this->operands[$identifier]) . '`');
            }

            $this->operands[$identifier] = $operand;
        }
    }

    /**
     * Check if an operand is registered for the given token
     *
     * @param  Token   $token
     * @return boolean True if a operand for the given token exists, false otherwise.
     */
    public function isRegistered(Token $token)
    {
        return isset($this->operands[$token->getCode()]);
    }

    /**
     * Get the operand for the given token
     *
     * @param  Token   $token The token which must be defined as identifier for the operand
     * @return Operand
     */
    public function getOperand(Token $token)
    {
        if ($this->isRegistered($token)) {
            return $this->operands[$token->getCode()];
        }

        // Thrown if no operand for the given token exists
        throw new InvalidIdentifierException('No operand for identifier `' . $token->getCode() . '` exists in table');
    }
}
