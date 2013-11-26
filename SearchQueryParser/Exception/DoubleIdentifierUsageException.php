<?php

namespace EmanueleMinotto\SearchQueryParser\Exception;

use Exception;

/**
 * Signals that an identifier is already in use for an other operand
 */
class DoubleIdentifierUsageException extends Exception {}
