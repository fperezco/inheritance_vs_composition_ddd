<?php

namespace App\Tests\Resources\Factory\FactoryTraits;


use App\Domain\OneToMany\CompositionMode\ArticleComposition\Entity\ArticleComposition;
use App\Domain\Shared\ValueObject\Uuid;


trait ArticleCompositionFactoryTrait
{
    public function getValidArticleComposition(Uuid $uuid = null, string $title = null, string $text = null): ArticleComposition
    {
        if (!$uuid) {
            $uuid = $this->getValidUUid();
        }

        if (!$title) {
            $title = $this->faker->regexify('[a-z]{10}');
        }

        if (!$text) {
            $text = $this->faker->regexify('[a-z]{30}');
        }

        return new ArticleComposition($uuid, $title, $text);
    }

}