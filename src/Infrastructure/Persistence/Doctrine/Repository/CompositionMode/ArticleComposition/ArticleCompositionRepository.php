<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository\CompositionMode\ArticleComposition;

use App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity\ArticleComposition;
use App\Domain\OneToMany\CompositionMode\ArticleComposition\Repository\ArticleCompositionRepositoryInterface;
use App\Domain\Shared\ValueObject\Uuid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ArticleCompositionRepository extends ServiceEntityRepository implements ArticleCompositionRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityRepositoryClass());
    }

    protected function getAliasTable(): string
    {
        return 'articlecomposition_objects';
    }

    protected function getEntityRepositoryClass(): string
    {
        return ArticleComposition::class;
    }

    public function save(ArticleComposition $articleComposition): ArticleComposition
    {
        $this->_em->persist($articleComposition);
        $this->_em->flush();
        return $articleComposition;
    }

    public function delete(ArticleComposition $articleComposition): void
    {
        $this->_em->remove($articleComposition);
        $this->_em->flush();
    }

    public function findAll(): iterable
    {
        return parent::findAll();
    }

    public function findOneByCriteria(array $criteria): ?ArticleComposition
    {
        return parent::findOneBy($criteria);
    }

    public function findOneById(Uuid $uuid): ?ArticleComposition
    {
        return parent::findOneBy(['uuid' => $uuid]);
    }
}