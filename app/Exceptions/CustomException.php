<?php

namespace App\Exceptions;

use Exception;

class CustomException extends Exception
{
    public function __construct($message = 'Custom error occurred', $code = 400)
    {
        parent::__construct($message, $code);
    }
}
