<?php

namespace App\Domain\OneToMany\InheritanceMode\CommentInheritance\Repository;

use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Entity\CommentInheritance;
use App\Domain\Shared\ValueObject\Uuid;

interface CommentInheritanceRepositoryInterface
{
    public function save(CommentInheritance $commentInheritance): CommentInheritance;

    public function delete(CommentInheritance $commentInheritance): void;

    public function findOneByCriteria(array $criteria): ?CommentInheritance;

    public function findAllByCriteria(array $criteria): iterable;

    public function findOneById(Uuid $uuid): ?CommentInheritance;

    public function findAll(): iterable;
}