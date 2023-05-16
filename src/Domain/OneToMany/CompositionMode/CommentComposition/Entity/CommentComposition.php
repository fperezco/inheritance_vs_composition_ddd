<?php

namespace App\Domain\OneToMany\CompositionMode\CommentComposition\Entity;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\ValueObject\CommentParentId;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;
use App\Domain\Shared\ValueObject\Uuid;

class CommentComposition
{
    private Uuid $uuid;
    private CommentParentId $commentParentId;
    private string $comment;
    private \DateTime $commentDate;

    public function __construct(CommentableCompositionInterface $commentableObject, DateTimeProvider $dateTimeProvider,string $comment)
    {
        $this->commentDate = $dateTimeProvider->getCurrentDate();
        $this->comment = $comment;
        $this->uuid = Uuid::random();
        $this->commentParentId = $commentableObject->commentParentId();
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

    /**
     * @return CommentParentId
     */
    public function getCommentParentId(): CommentParentId
    {
        return $this->commentParentId;
    }

}
