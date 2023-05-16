<?php

namespace App\Tests\Domain\OneToMany\CompositionMode\ArticleComposition\Entity;

use App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity\ArticleComposition;
use App\Domain\Shared\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

class ArticleCompositionTest extends TestCase
{
    /**test*/
    public function test_that_title_is_set_correctly()
    {
        //GIVEN
        $title = "balblab";
        $text = "asdsadfdsa";
        $articleComposition = new ArticleComposition(Uuid::random(),$title,$text);
        //WHEN
        //THEN
        $this->assertEquals($title,$articleComposition->getTitle());
    }
}
