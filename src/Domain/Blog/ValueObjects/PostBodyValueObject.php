<?php


namespace App\Domain\Blog\ValueObjects;


use App\Domain\Blog\Exceptions\InvalidPostBodyException;

class PostBodyValueObject
{
    /**
     * @var string $body
     *
     */
    private $body;

    /**
     * PostBodyValueObject constructor to set body as a property
     * @param string $body
     */
    public function __construct(string $body)
    {
        $this->body = $body;
    }

    /**
     * make a new post body value object
     *
     * @param string $body
     * @return static
     * @throws InvalidPostBodyException
     */
    public static function makeFrom(string $body): PostBodyValueObject
    {
        if (strlen($body) > 20) {
            return new static($body);
        }

        throw new InvalidPostBodyException('post body must be longer than 20 characters', 422);
    }

    /**
     * get body
     *
     * @return string body
     */
    public function getBody(): string
    {
        return $this->body;
    }
}