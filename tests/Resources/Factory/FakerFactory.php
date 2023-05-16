<?php

declare(strict_types=1);

namespace App\Tests\Resources\Factory;


use App\Domain\Shared\ValueObject\Uuid;
use App\Tests\Resources\Factory\FactoryTraits\ArticleCompositionFactoryTrait;
use App\Tests\Resources\Factory\FactoryTraits\ArticleInheritanceFactoryTrait;
use Faker\Factory;
use Faker\Generator;

class FakerFactory
{
    use ArticleInheritanceFactoryTrait;
    use ArticleCompositionFactoryTrait;


    public ?Generator $faker = null;

    public function __construct()
    {
        $this->faker = Factory::create();
    }

    public function getValidUUid(): Uuid
    {
        return new Uuid(Factory::create()->uuid());
    }

}
