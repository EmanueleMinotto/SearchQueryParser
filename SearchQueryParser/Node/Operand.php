<?php

namespace EmanueleMinotto\SearchQueryParser\Node;

use EmanueleMinotto\SearchQueryParser\NodeInterface;

/**
 * Represents an operand node
 */
class Operand implements NodeInterface
{
    /**
     * The operand which this node represents
     *
     * @var mixed
     */
    private $operand = null;

    /**
     * The class constructor
     *
     * @param mixed $operand
     */
    public function __construct($operand)
    {
        $this->operand = $operand;
    }

    /**
     * Evaluates the node
     *
     * @return mixed
     */
    public function evaluate()
    {
        return $this->operand;
    }
}
