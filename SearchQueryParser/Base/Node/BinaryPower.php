<?php

namespace EmanueleMinotto\SearchQueryParser\Base\Node;

use EmanueleMinotto\SearchQueryParser\Node\AbstractBinary;

/**
 * Represents a binary exponentiation
 */
class BinaryPower extends AbstractBinary
{
    /**
     * Evaluates the node
     *
     * @return numeric
     */
    public function evaluate()
    {
        $left = $this->left->evaluate();
        $right = $this->right->evaluate();

        return (is_numeric($left) && is_numeric($right))
            ? $left ^ $right
            : '(' . $left . ' ^ ' . $right . ')';
    }
}
