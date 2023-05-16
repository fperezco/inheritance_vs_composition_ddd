<?php

namespace App\Application\OneToMany\InheritanceMode\Services;

use App\Domain\OneToMany\InheritanceMode\CommentableObject\Repository\CommentableObjectRepositoryInterface;
use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Entity\CommentInheritance;
use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Repository\CommentInheritanceRepositoryInterface;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;
use App\Domain\Shared\ValueObject\Uuid;

class AddCommentToCommentableObjectService
{
    private CommentInheritanceRepositoryInterface $commentInheritanceRepository;
    private DateTimeProvider $dateTimeProvider;
    private CommentableObjectRepositoryInterface $commentableObjectRepository;

    public function __construct(
        CommentableObjectRepositoryInterface  $commentableObjectRepository,
        CommentInheritanceRepositoryInterface $commentInheritanceRepository,
        DateTimeProvider                      $dateTimeProvider)
    {
        $this->commentInheritanceRepository = $commentInheritanceRepository;
        $this->dateTimeProvider = $dateTimeProvider;
        $this->commentableObjectRepository = $commentableObjectRepository;
    }

    public function __invoke(Uuid $commentableObjectUuid, string $comment)
    {
        //to prevent a fake or not store $commentable object here.
        $commentableObject = $this->commentableObjectRepository->findOneById($commentableObjectUuid);
        $newComment = CommentInheritance::create($commentableObject, $this->dateTimeProvider, $comment);
        $this->commentInheritanceRepository->save($newComment);
    }
}