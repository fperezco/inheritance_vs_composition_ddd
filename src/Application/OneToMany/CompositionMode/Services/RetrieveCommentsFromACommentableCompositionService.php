<?php

namespace App\Application\OneToMany\CompositionMode\Services;

use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Entity\CommentComposition;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Repository\CommentCompositionRepositoryInterface;

/**
 * Yes, a domain service that injects a repository...
 */
class RetrieveCommentsFromACommentableCompositionService
{
    private CommentCompositionRepositoryInterface $commentCompositionRepository;

    public function __construct(CommentCompositionRepositoryInterface $commentCompositionRepository)
    {
        $this->commentCompositionRepository = $commentCompositionRepository;
    }

    /**
     * @param CommentableCompositionInterface $commentableCompositionObject
     * @return iterable | CommentComposition
     */
    public function __invoke(CommentableCompositionInterface $commentableCompositionObject): iterable{
        return $this->commentCompositionRepository->findLatestByCommentable($commentableCompositionObject);
    }
}