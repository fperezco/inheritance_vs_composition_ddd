<?php

namespace App\Application\OneToMany\CompositionMode\Services;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Entity\CommentComposition;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Repository\CommentCompositionRepositoryInterface;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;

/**
 * Yes, a domain service that injects a repository...
 */
class SaveCommentFromACommentableCompositionService
{
    private CommentCompositionRepositoryInterface $commentCompositionRepository;

    public function __construct(CommentCompositionRepositoryInterface $commentCompositionRepository)
    {
        $this->commentCompositionRepository = $commentCompositionRepository;
    }

    /**
     * @param string $comment
     * @param CommentableCompositionInterface $commentableCompositionObject
     * @param DateTimeProvider $dateTimeProvider
     * @return iterable | CommentComposition
     */
    public function __invoke(string $comment, CommentableCompositionInterface $commentableCompositionObject,DateTimeProvider $dateTimeProvider): void{
        $commentComposition = new CommentComposition($commentableCompositionObject,$dateTimeProvider,$comment);
        $this->commentCompositionRepository->save($commentComposition);
    }
}