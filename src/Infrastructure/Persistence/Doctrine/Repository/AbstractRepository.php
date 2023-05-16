<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class AbstractRepository extends ServiceEntityRepository
{
    abstract protected function getAliasTable(): string;
    abstract protected function getEntityRepositoryClass(): string;


    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityRepositoryClass());
    }
}
