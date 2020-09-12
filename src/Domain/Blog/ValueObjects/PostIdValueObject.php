<?php


namespace App\Domain\Blog\ValueObjects;


use http\Exception\InvalidArgumentException;
use MongoDB\BSON\ObjectId;

class PostIdValueObject
{
    /**
     * post id
     * @var string
     */
    private $id;

    /**
     * PostIdValueObject constructor to save id as a property
     * @param string $id
     */
    private function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * make an id value object from given id
     *
     * @param string $id
     * @return static
     */
    public static function makeFrom(string $id)
    {

        if (new ObjectId($id)) {
            return new static($id);
        } else {
            throw new InvalidArgumentException('id must be a valid number bigger than 0');
        }
    }

    /**
     * get post id
     *
     * @return int
     */
    public function getId(): string
    {
        return $this->id;
    }
}