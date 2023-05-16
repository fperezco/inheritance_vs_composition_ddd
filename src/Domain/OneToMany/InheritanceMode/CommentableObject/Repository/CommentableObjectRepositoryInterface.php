<?php

namespace App\Domain\OneToMany\InheritanceMode\CommentableObject\Repository;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\ValueObject\Uuid;

interface CommentableObjectRepositoryInterface
{
    public function save(CommentableObject $commentableObject): CommentableObject;
    public function delete(CommentableObject $commentableObject): void;
    public function findOneByCriteria(array $criteria): ?CommentableObject;
    public function findOneById(Uuid $uuid): ?CommentableObject;
    public function findAll(): iterable;

}