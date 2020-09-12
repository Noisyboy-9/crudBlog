<?php


namespace App\Domain\Blog\Exceptions;


class InvalidPostIdException extends \Exception
{
    protected $message = 'id must be a string consisting number and string';
}