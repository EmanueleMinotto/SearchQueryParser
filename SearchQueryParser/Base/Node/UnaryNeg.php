<?php

namespace EmanueleMinotto\SearchQueryParser\Base\Node;

use EmanueleMinotto\SearchQueryParser\Node\AbstractUnary;

/**
 * Represents an unary negative expression
 */
class UnaryNeg extends AbstractUnary
{
    /**
     * Evaluates the node
     *
     * @return numeric
     */
    public function evaluate()
    {
        $node = $this->node->evaluate();

        return is_numeric($node) ? -$node : '(-' . $node . ')';
    }
}
