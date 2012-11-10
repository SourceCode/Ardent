<?php

namespace Spl;

use Exception;

/**
 * LookupException should be thrown when a requested item does not exist in the
 * data structure.
 *
 * Known sub-classes
 *  - IndexException
 *  - KeyException
 */
class LookupException extends Exception {

}
