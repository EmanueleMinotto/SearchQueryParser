<?php

namespace EmanueleMinotto\SearchQueryParser\Node;

/**
 * Represents a binary OR
 */
class LogicalOr extends AbstractBinary
{
    /**
     * Evaluates the node
     *
     * @return string
     */
    public function evaluate()
    {
        $left = $this->left->evaluate();
        $right = $this->right->evaluate();

        return '(' . $left . ' || ' . $right . ')';
    }
}
