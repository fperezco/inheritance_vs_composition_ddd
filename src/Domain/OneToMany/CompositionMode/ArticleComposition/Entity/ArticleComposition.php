<?php

namespace App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\ValueObject\CommentParentId;
use App\Domain\Shared\ValueObject\Uuid;

class ArticleComposition  implements CommentableCompositionInterface
{
    private string $title;
    private string $text;
    private Uuid $uuid;

    /**
     * @param Uuid $uuid
     * @param string $title
     * @param string $text
     */
    public function __construct(Uuid $uuid,string $title, string $text)
    {
        $this->title = $title;
        $this->text = $text;
        $this->uuid = $uuid;
    }

    /**
     * This is the only method that interface CommentableCompositionInterface forces you to implement if you want to be able to
     * receive comments
     * @return CommentParentId
     */
    public function commentParentId(): CommentParentId
    {
        return new CommentParentId($this->getUuid()->value(), ArticleComposition::class);
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
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