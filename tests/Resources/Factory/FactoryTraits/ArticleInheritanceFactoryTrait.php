<?php

namespace App\Tests\Resources\Factory\FactoryTraits;


use App\Domain\OneToMany\InheritanceMode\ArticleInheritance\Entity\ArticleInheritance;
use App\Domain\Shared\ValueObject\Uuid;


trait ArticleInheritanceFactoryTrait
{
    public function getValidArticleInheritance(Uuid $uuid = null, string $title = null, string $text = null): ArticleInheritance
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

        return new ArticleInheritance($uuid, $title, $text);
    }

}