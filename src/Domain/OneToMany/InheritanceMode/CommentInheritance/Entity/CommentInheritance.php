<?php

namespace App\Domain\OneToMany\InheritanceMode\CommentInheritance\Entity;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;
use App\Domain\Shared\ValueObject\Uuid;

class CommentInheritance
{
    private Uuid $commentableObjectParent;
    private string $comment;
    private \DateTime $commentDate;
    private Uuid $uuid;

    private function __construct(Uuid $commentableObjectParent, Uuid $uuid, DateTimeProvider $dateTimeProvider, string $comment)
    {
        $this->commentableObjectParent = $commentableObjectParent;
        $this->uuid = $uuid;
        $this->commentDate = $dateTimeProvider->getCurrentDate();
        $this->comment = $comment;
    }

    public static function create(CommentableObject $commentableObjectParent, DateTimeProvider $dateTimeProvider, string $comment):CommentInheritance
    {
        return new self($commentableObjectParent->getUuid(),Uuid::random(),$dateTimeProvider,$comment);
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
    public function getText(): string
    {
        return $this->comment;
    }

    /**
     * @param string $comment
     */
    public function setText(string $comment): void
    {
        $this->comment = $comment;
    }

    /**
     * @return \DateTime
     */
    public function getCommentDate(): \DateTime
    {
        return $this->commentDate;
    }

    /**
     * @param \DateTime $commentDate
     */
    public function setCommentDate(\DateTime $commentDate): void
    {
        $this->commentDate = $commentDate;
    }

}