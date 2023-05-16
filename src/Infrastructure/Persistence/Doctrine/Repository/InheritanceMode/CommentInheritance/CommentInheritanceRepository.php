<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository\InheritanceMode\CommentInheritance;


use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Entity\CommentInheritance;
use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Repository\CommentInheritanceRepositoryInterface;
use App\Domain\Shared\ValueObject\Uuid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommentInheritanceRepository extends ServiceEntityRepository implements CommentInheritanceRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityRepositoryClass());
    }

    protected function getAliasTable(): string
    {
        return 'comment_inheritance_objects';
    }

    protected function getEntityRepositoryClass(): string
    {
        return CommentInheritance::class;
    }

    public function save(CommentInheritance $commentInheritance): CommentInheritance
    {
        $this->_em->persist($commentInheritance);
        $this->_em->flush();
        return $commentInheritance;
    }

    public function delete(CommentInheritance $commentInheritance): void
    {
        $this->_em->remove($commentInheritance);
        $this->_em->flush();
    }

    public function findAll(): iterable
    {
        return parent::findAll();
    }

    public function findOneByCriteria(array $criteria): ?CommentInheritance
    {
        return parent::findOneBy($criteria);
    }

    public function findAllByCriteria(array $criteria): iterable
    {
        return parent::findBy($criteria);
    }

    public function findOneById(Uuid $uuid): ?CommentInheritance
    {
        return parent::findOneBy(['uuid' => $uuid]);
    }
}