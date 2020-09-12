<?php


namespace App\Domain\Blog\Exceptions;


use Throwable;

class InvalidPostTitleException extends \Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}