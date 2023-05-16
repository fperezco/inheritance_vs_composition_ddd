<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\InheritanceMode\CommentableObject\Shared\Base;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\ValueObject\Uuid;
use App\Infrastructure\Persistence\Doctrine\Repository\AbstractRepository;

abstract class CommentableObjectRepositoryAbstract extends AbstractRepository
{
    abstract protected function getAliasTable(): string;

    abstract protected function getCurrentDiscriminator(): string;

    abstract protected function getEntityRepositoryClass(): string;

    public function save(CommentableObject $CommentableObject): CommentableObject
    {
        $this->_em->persist($CommentableObject);
        $this->_em->flush();
        return $CommentableObject;
    }

    public function delete(CommentableObject $CommentableObject): void
    {
        $this->_em->remove($CommentableObject);
        $this->_em->flush();
    }


    public function findAll(): iterable
    {
        return parent::findAll();
    }

    public function findOneByCriteria(array $criteria): ?CommentableObject
    {
        return parent::findOneBy($criteria);
    }

    public function findOneById(Uuid $uuid): ?CommentableObject
    {
        return parent::findOneBy(['uuid' => $uuid]);
    }
}
