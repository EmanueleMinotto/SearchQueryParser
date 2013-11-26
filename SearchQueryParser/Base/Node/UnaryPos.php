<?php

namespace EmanueleMinotto\SearchQueryParser\Base\Node;

use EmanueleMinotto\SearchQueryParser\Node\AbstractUnary;

/**
 * Represents an unary positive expression
 */
class UnaryPos extends AbstractUnary
{
    /**
     * Evaluates the node
     *
     * @return numeric
     */
    public function evaluate()
    {
        $node = $this->node->evaluate();

        return is_numeric($node) ? +$node : '(+' . $node . ')';
    }
}
