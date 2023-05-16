<?php

namespace App\Domain\OneToMany\CompositionMode\VideoComposition\Repository;

use App\Domain\OneToMany\CompositionMode\VideoComposition\Entity\VideoComposition;
use App\Domain\Shared\ValueObject\Uuid;

interface VideoCompositionRepositoryInterface
{
    public function save(VideoComposition $videoComposition): VideoComposition;

    public function delete(VideoComposition $videoComposition): void;

    public function findOneByCriteria(array $criteria): ?VideoComposition;

    public function findOneById(Uuid $uuid): ?VideoComposition;

    public function findAll(): iterable;
}