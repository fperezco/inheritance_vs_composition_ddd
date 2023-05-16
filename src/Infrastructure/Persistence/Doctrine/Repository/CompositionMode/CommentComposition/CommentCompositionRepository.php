<?php

namespace App\Infrastructure\Persistence\Doctrine\Repository\CompositionMode\CommentComposition;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Entity\CommentComposition;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Repository\CommentCompositionRepositoryInterface;
use App\Domain\Shared\ValueObject\Uuid;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CommentCompositionRepository  extends ServiceEntityRepository implements CommentCompositionRepositoryInterface
{

    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, $this->getEntityRepositoryClass());
    }

    protected function getAliasTable(): string
    {
        return 'commentscomposition';
    }

    protected function getEntityRepositoryClass(): string
    {
        return CommentComposition::class;
    }

    public function save(CommentComposition $commentComposition): CommentComposition
    {
        $this->_em->persist($commentComposition);
        $this->_em->flush();
        return $commentComposition;
    }

    public function delete(CommentComposition $commentComposition): void
    {
        $this->_em->remove($commentComposition);
        $this->_em->flush();
    }

    public function findAll(): iterable
    {
        return parent::findAll();
    }

    public function findOneByCriteria(array $criteria): ?CommentComposition
    {
        return parent::findOneBy($criteria);
    }

    public function findOneById(Uuid $uuid): ?CommentComposition
    {
        return parent::findOneBy(['uuid' => $uuid]);
    }


    public function findLatestByCommentable(CommentableCompositionInterface $commentable, int $numberOfComments = 10): iterable
    {
        $commentParentId = $commentable->commentParentId();

        $criteria = [
            'commentParentId.identifier' => $commentParentId->identifier(),
            'commentParentId.commentable' => $commentParentId->commentable(),
        ];

        $comments = [];
        foreach ($this->findBy($criteria, [], $numberOfComments) as $comment) {
            $comments[] = $comment;
        }
        return $comments;
    }

}