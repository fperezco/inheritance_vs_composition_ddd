<?php

namespace App\Domain\OneToMany\CompositionMode\CommentComposition\Repository;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Entity\CommentComposition;

interface CommentCompositionRepositoryInterface
{
    public function save(CommentComposition $commentComposition): CommentComposition;
    public function findLatestByCommentable(CommentableCompositionInterface $commentable, int $numberOfComments = 10): iterable;
}