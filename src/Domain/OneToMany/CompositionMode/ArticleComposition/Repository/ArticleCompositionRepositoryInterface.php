<?php

namespace App\Domain\OneToMany\CompositionMode\ArticleComposition\Repository;

use App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity\ArticleComposition;
use App\Domain\Shared\ValueObject\Uuid;

interface ArticleCompositionRepositoryInterface
{
    public function save(ArticleComposition $articleComposition): ArticleComposition;

    public function delete(ArticleComposition $articleComposition): void;

    public function findOneByCriteria(array $criteria): ?ArticleComposition;

    public function findOneById(Uuid $uuid): ?ArticleComposition;

    public function findAll(): iterable;
}