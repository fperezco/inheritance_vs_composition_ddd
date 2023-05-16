<?php

namespace App\Tests\Infrastructure\OneToMany\CompositionMode\ArticleComposition\Entity;

use App\Application\OneToMany\CompositionMode\Services\RetrieveCommentsFromACommentableCompositionService;
use App\Application\OneToMany\CompositionMode\Services\SaveCommentFromACommentableCompositionService;
use App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity\ArticleComposition;
use App\Domain\OneToMany\CompositionMode\ArticleComposition\Repository\ArticleCompositionRepositoryInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Entity\CommentComposition;
use App\Domain\OneToMany\CompositionMode\CommentComposition\Repository\CommentCompositionRepositoryInterface;
use App\Domain\Shared\DateTimeProvider\DateTimeProvider;
use App\Tests\Infrastructure\FunctionalTestCase;

class ArticleCompositionRepositoryTest extends FunctionalTestCase
{
    private ?object $articleCompositionRepository;
    private ?CommentCompositionRepositoryInterface $commentCompositionRepository;

    public function setUp(): void
    {
        $this->articleCompositionRepository = self::getContainer()->get(ArticleCompositionRepositoryInterface::class);
        $this->commentCompositionRepository = self::getContainer()->get(CommentCompositionRepositoryInterface::class);
        parent::setUp();
    }

    public function test_it_should_save_an_articleComposition()
    {
        //GIVEN
        $articleComposition = $this->fakerFactory->getValidArticleComposition();
        //WHEN
        $this->articleCompositionRepository->save($articleComposition);
        $this->clearUnitOfWork();
        //THEN
        $this->assertArticleCompositionEquals($articleComposition, $this->articleCompositionRepository->findOneById($articleComposition->getUuid()));

    }

    /** @test */
    public function it_should_delete_an_article_composition(): void
    {
        //GIVEN
        $articleComposition = $this->fakerFactory->getValidArticleComposition();
        $this->articleCompositionRepository->save($articleComposition);
        $this->clearUnitOfWork();
        $article = $this->articleCompositionRepository->findOneById($articleComposition->getUuid());
        //WHEN
        $this->articleCompositionRepository->delete($article);
        //THEN
        $this->assertEquals(null,  $this->articleCompositionRepository->findOneById($articleComposition->getUuid()));
    }


    /** @test */
    public function it_should_save_a_comment_inside_the_articleComposition_object_and_retrieve_later(): void
    {
        //GIVEN
        $dateTimeProvider = $this->createMock(DateTimeProvider::class);
        $dateTimeProvider->method('getCurrentDate')->willReturn(new \DateTime('2022-02-02 02:02:02'));
        $saveCommentFromACommentableCompositionService = new SaveCommentFromACommentableCompositionService($this->commentCompositionRepository);
        $retrieveCommentsFromACommentableService = new RetrieveCommentsFromACommentableCompositionService($this->commentCompositionRepository);
        $articleComposition = $this->fakerFactory->getValidArticleComposition();
        //save a comment
        $comment1 = "blalblabl1";
        $saveCommentFromACommentableCompositionService->__invoke($comment1, $articleComposition,$dateTimeProvider);
        $this->clearUnitOfWork();
        //WHEN
        $comments = $retrieveCommentsFromACommentableService->__invoke($articleComposition);

        //THEN
        $this->assertCount(1,$comments);
        $this->assertEquals($comments[0]->getText(),$comment1);
    }
    
    
    private function assertArticleCompositionEquals(ArticleComposition $a1, ArticleComposition $a2): void {
        $this->assertEquals($a1->getUuid(),$a2->getUuid());
        $this->assertEquals($a1->getTitle(),$a2->getTitle());
        $this->assertEquals($a1->getText(),$a2->getText());
    }

    private function assertCommentEqual(CommentComposition $commentA, CommentComposition $commentB)
    {
        $this->assertEquals($commentA->getCommentParentId(),$commentB->getCommentParentId());
        $this->assertEquals($commentA->getUuid(),$commentB->getUuid());
        $this->assertEquals($commentA->getText(),$commentB->getText());
        $this->assertEquals($commentA->getCommentDate(),$commentB->getCommentDate());
    }

}