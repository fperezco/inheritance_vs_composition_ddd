<?php

namespace App\Application\OneToMany\InheritanceMode\Services;

use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Entity\CommentInheritance;
use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Repository\CommentInheritanceRepositoryInterface;
use App\Domain\Shared\ValueObject\Uuid;

class GetCommentsOfCommentableObjectService
{
    private CommentInheritanceRepositoryInterface $commentInheritanceRepository;

    public function __construct(
        CommentInheritanceRepositoryInterface $commentInheritanceRepository)
    {
        $this->commentInheritanceRepository = $commentInheritanceRepository;
    }

    /**
     * @param Uuid $commentableObjectUuid
     * @return iterable | CommentInheritance[]
     */
    public function __invoke(Uuid $commentableObjectUuid): iterable
    {
        return $this->commentInheritanceRepository->findAllByCriteria(['commentableObjectParent' => $commentableObjectUuid]);
    }
}