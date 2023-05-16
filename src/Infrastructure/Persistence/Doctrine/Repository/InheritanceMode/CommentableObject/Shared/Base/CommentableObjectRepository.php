<?php

declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository\InheritanceMode\CommentableObject\Shared\Base;


use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\OneToMany\InheritanceMode\CommentableObject\Repository\CommentableObjectRepositoryInterface;

class CommentableObjectRepository extends CommentableObjectRepositoryAbstract implements CommentableObjectRepositoryInterface
{

    protected function getAliasTable(): string
    {
        return 'commentable_objects';
    }

    protected function getEntityRepositoryClass(): string
    {
        return CommentableObject::class;
    }

    protected function getCurrentDiscriminator(): string
    {
        return '';
    }
}
