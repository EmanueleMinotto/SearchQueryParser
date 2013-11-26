<?php

namespace EmanueleMinotto\SearchQueryParser;

use EmanueleMinotto\SearchQueryParser\Operator\BinaryOperator;
use EmanueleMinotto\SearchQueryParser\Operator\UnaryOperator;
use EmanueleMinotto\SearchQueryParser\Exception\UnsupportedOperatorException;

/**
 * Contains a list of operators
 */
class Operators
{
    /**
     * The unary operator table
     *
     * @var array
     */
    private $unary = array();

    /**
     * The binary operator table
     *
     * @var array
     */
    private $binary = array();

    /**
     * Adds a new operator to the table
     *
     * @param OperatorInterface $operator
     */
    public function addOperator(OperatorInterface $operator)
    {
        if ($operator instanceof BinaryOperator) {
            $this->binary[$operator->getCode()] = $operator;
        } elseif ($operator instanceof UnaryOperator) {
            $this->unary[$operator->getCode()] = $operator;
        } else {
            // Thrown if an unsupported operator type was given
            throw new UnsupportedOperatorException('The operator type `' . get_class($operator) . '` isn\'t supported');
        }
    }

    /**
     * Check if the given token is a binary operator
     *
     * @param  Token   $token
     * @return boolean
     */
    public function isBinary(Token $token)
    {
        return isset($this->binary[$token->getCode()]);
    }

    /**
     * Check if the given token is an unary operator
     *
     * @param  Token   $token
     * @return boolean
     */
    public function isUnary(Token $token)
    {
        return isset($this->unary[$token->getCode()]);
    }

    /**
     * Gets a binary operator from table
     *
     * @param  Token                                                     $token
     * @return EmanueleMinotto\SearchQueryParser\Operator\BinaryOperator
     */
    public function getBinaryOperator(Token $token)
    {
        if (isset($this->binary[$token->getCode()])) {
            return $this->binary[$token->getCode()];
        }
        // Thrown if the operator doesn't exists in table
        throw new UnsupportedOperatorException('No binary operator with code `' . $token->getCode() . '` exists in table');
    }

    /**
     * Gets an unary operator from table
     *
     * @param  Token                                                    $token
     * @return EmanueleMinotto\SearchQueryParser\Operator\UnaryOperator
     */
    public function getUnaryOperator(Token $token)
    {
        if (isset($this->unary[$token->getCode()])) {
            return $this->unary[$token->getCode()];
        }
        // Thrown if the operator doesn't exists in table
        throw new UnsupportedOperatorException('No unary operator with code `' . $token->getCode() . '` exists in table');
    }
}
