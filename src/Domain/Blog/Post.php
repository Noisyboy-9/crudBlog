<?php


namespace App\Domain\Blog;


use App\Domain\Blog\ValueObjects\PostBodyValueObject;
use App\Domain\Blog\ValueObjects\PostTitleValueObject;

class Post
{
    /**
     * post title value object
     *
     * @var PostTitleValueObject
     */
    private $titleValueObject;

    /**
     * post body value object
     *
     * @var PostBodyValueObject $bodyValueObject
     */
    private $bodyValueObject;


    /**
     * Post constructor to set title and body value objects as properties
     * @param PostTitleValueObject $titleValueObject
     * @param PostBodyValueObject $bodyValueObject
     */
    private function __construct(PostTitleValueObject $titleValueObject, PostBodyValueObject $bodyValueObject)
    {
        $this->titleValueObject = $titleValueObject;
        $this->bodyValueObject = $bodyValueObject;
    }

    /**
     * generate a post entity
     *
     * @param PostTitleValueObject $titleValueObject
     * @param PostBodyValueObject $bodyValueObject
     * @return static
     */
    public static function createPostFrom(PostTitleValueObject $titleValueObject, PostBodyValueObject $bodyValueObject)
    {
        return new static($titleValueObject, $bodyValueObject);
    }

    /**
     * get post entity as a array
     *
     * @return array
     */
    public function getPostArray(): array
    {
        return [
            'title' => $this->titleValueObject->getTitle(),
            'body' => $this->bodyValueObject->getBody(),
        ];
    }

    /**
     * get post title
     *
     * @return string
     */
    public function getTitle(): string
    {
        return $this->titleValueObject->getTitle();
    }

    /**
     * get post body
     *
     * @return string
     */
    public function getBody(): string
    {
        return $this->bodyValueObject->getBody();
    }
}