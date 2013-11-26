<?php

namespace EmanueleMinotto\SearchQueryParser;

/**
 * Represents an expression node
 */
interface NodeInterface
{
    /**
     * Evaluates the node
     */
    public function evaluate();
}
