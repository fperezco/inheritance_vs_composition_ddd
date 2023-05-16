<?php

namespace App\Domain\OneToMany\CompositionMode\CommentComposition\ValueObject;

final class CommentParentId
{
    private string $identifier;
    private string $commentable;

    public function __construct(string $identifier, string $commentable)
    {
        $this->identifier = $identifier;
        $this->commentable = $commentable;
    }

    public function identifier(): string
    {
        return $this->identifier;
    }

    public function commentable(): string
    {
        return $this->commentable;
    }
}