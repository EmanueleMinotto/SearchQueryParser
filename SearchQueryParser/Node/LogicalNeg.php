<?php

namespace EmanueleMinotto\SearchQueryParser\Node;

/**
 * Represents an unary negative expression
 */
class LogicalNeg extends AbstractUnary
{
    /**
     * Evaluates the node
     *
     * @return string
     */
    public function evaluate()
    {
        $node = $this->node->evaluate();

        return '(!(' . $node . '))';
    }
}
