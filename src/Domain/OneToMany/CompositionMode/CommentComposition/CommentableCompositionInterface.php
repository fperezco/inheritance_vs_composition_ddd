<?php

namespace App\Domain\OneToMany\CompositionMode\CommentComposition;

use App\Domain\OneToMany\CompositionMode\CommentComposition\ValueObject\CommentParentId;

/**
 * Every class that want to receive comments by composition should implement this method, that return its
 * identifier to be referenced in the comments table
 */
interface CommentableCompositionInterface
{
    public function commentParentId(): CommentParentId;
}