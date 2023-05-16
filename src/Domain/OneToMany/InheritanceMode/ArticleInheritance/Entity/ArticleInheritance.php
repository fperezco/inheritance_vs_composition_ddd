<?php

namespace App\Domain\OneToMany\InheritanceMode\ArticleInheritance\Entity;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\ValueObject\Uuid;

class ArticleInheritance extends CommentableObject
{
    private string $title;
    private string $text;

    /**
     * @param Uuid $uuid
     * @param string $title
     * @param string $text
     */
    public function __construct(Uuid $uuid,string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
        parent::__construct($uuid);
    }


    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

}