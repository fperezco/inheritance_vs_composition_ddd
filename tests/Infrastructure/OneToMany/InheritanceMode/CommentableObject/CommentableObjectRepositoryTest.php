<?php
declare(strict_types=1);

namespace App\Tests\Infrastructure\OneToMany\InheritanceMode\CommentableObject;

use App\Application\OneToMany\InheritanceMode\Services\AddCommentToCommentableObjectService;
use App\Application\OneToMany\InheritanceMode\Services\GetCommentsOfCommentableObjectService;
use App\Domain\OneToMany\InheritanceMode\ArticleInheritance\Entity\ArticleInheritance;
use App\Domain\OneToMany\InheritanceMode\CommentableObject\Repository\CommentableObjectRepositoryInterface;
use App\Domain\OneToMany\InheritanceMode\CommentInheritance\Repository\CommentInheritanceRepositoryInterface;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;
use App\Tests\Infrastructure\FunctionalTestCase;


class CommentableObjectRepositoryTest extends FunctionalTestCase
{

    /** @var object|null |CommentableObjectRepositoryInterface */
    private ?object $commentableObjectRepository;
    /** @var object|null | CommentInheritanceRepositoryInterface */
    private ?object $commentInheritanceRepository;

    public function setUp(): void
    {
        $this->commentableObjectRepository = self::getContainer()->get(CommentableObjectRepositoryInterface::class);
        $this->commentInheritanceRepository = self::getContainer()->get(CommentInheritanceRepositoryInterface::class);
        parent::setUp();
    }


    /** @test */
    public function it_should_save_a_commentable_object(): void
    {
        //GIVEN
        $articleInheritance = $this->fakerFactory->getValidArticleInheritance();
        //WHEN
        $this->commentableObjectRepository->save($articleInheritance);
        $this->clearUnitOfWork();
        //THEN
        $this->assertArticleEquals($articleInheritance, $this->commentableObjectRepository->findOneById($articleInheritance->getUuid()));
    }


    /** @test */
    public function it_should_delete_an_commentable_object(): void
    {
        //GIVEN
        $articleInheritance = $this->fakerFactory->getValidArticleInheritance();
        $this->commentableObjectRepository->save($articleInheritance);
        $this->clearUnitOfWork();
        $article = $this->commentableObjectRepository->findOneById($articleInheritance->getUuid());
        //WHEN
        $this->commentableObjectRepository->delete($article);
        //THEN
        $this->assertEquals(null, $this->commentableObjectRepository->findOneById($articleInheritance->getUuid()));
    }

    /** @test */
    public function it_should_retrieve_all_commentables(): void
    {
        //GIVEN
        $articleInheritance = $this->fakerFactory->getValidArticleInheritance();
        $articleInheritance2 = $this->fakerFactory->getValidArticleInheritance();
        $this->commentableObjectRepository->save($articleInheritance);
        $this->commentableObjectRepository->save($articleInheritance2);
        $this->clearUnitOfWork();
        //WHEN
        $articles = $this->commentableObjectRepository->findAll();
        //THEN
        $this->assertEquals(2, count($articles));
    }


    /** @test */
    public function it_should_save_a_comment_inside_the_commentable_object_and_retrieve_later(): void
    {
        //GIVEN
        $comment1 = "blalblabl1";
        $articleInheritance = $this->fakerFactory->getValidArticleInheritance();
        $this->commentableObjectRepository->save($articleInheritance);
        $addCommentToCommentableObjectService = new AddCommentToCommentableObjectService($this->commentableObjectRepository,
            $this->commentInheritanceRepository, new DateTimeProvider());
        $getCommentsOfCommentableObjectService = new GetCommentsOfCommentableObjectService($this->commentInheritanceRepository);

        //WHEN
        $addCommentToCommentableObjectService->__invoke($articleInheritance->getUuid(), $comment1);
        $this->clearUnitOfWork();

        //THEN
        $comments = $getCommentsOfCommentableObjectService->__invoke($articleInheritance->getUuid());
        $this->assertCount(1,$comments);
        $this->assertEquals($comment1,$comments[0]->getText());
    }


    private function assertArticleEquals(ArticleInheritance $a1, ArticleInheritance $a2): void
    {
        $this->assertEquals($a1->getUuid(), $a2->getUuid());
        $this->assertEquals($a1->getTitle(), $a2->getTitle());
        $this->assertEquals($a1->getText(), $a2->getText());
    }


}