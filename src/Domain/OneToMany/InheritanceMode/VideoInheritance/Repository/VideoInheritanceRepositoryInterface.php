<?php

namespace App\Domain\OneToMany\InheritanceMode\VideoInheritance\Repository;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\ValueObject\Uuid;

interface VideoInheritanceRepositoryInterface
{
    public function save(CommentableObject $templateBaseCommentableObject): CommentableObject;

    public function delete(CommentableObject $templateBaseCommentableObject): void;

    public function findOneByCriteria(array $criteria): ?CommentableObject;

    public function findOneById(Uuid $uuid): ?CommentableObject;

    public function findAll(): iterable;
}