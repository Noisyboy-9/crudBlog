<?php


namespace App\Domain\Blog\ValueObjects;


use App\Domain\Blog\Exceptions\InvalidPostTitleException;

class PostTitleValueObject
{
    /**
     * @var string $title
     */
    private $title;

    /**
     * PostTitleValueObject constructor to save title as a property
     * @param $title
     */
    private function __construct($title)
    {

        $this->title = $title;
    }


    /**
     * make a new title value object
     *
     * @param string $title
     * @return PostTitleValueObject
     * @throws InvalidPostTitleException
     */
    public static function makeFrom(string $title): PostTitleValueObject
    {
        if (strlen($title) > 8) {
            return new static($title);
        } else {
            throw new InvalidPostTitleException('post title must be larager than 8 characters', 422);
        }
    }

    /**
     * get title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }
}