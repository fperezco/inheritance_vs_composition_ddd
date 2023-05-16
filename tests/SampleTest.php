<?php

namespace App\Tests;
use App\Domain\Shared\ValueObject\Uuid;

class SampleTest extends \PHPUnit\Framework\TestCase
{
    public function test_uuid(): void
    {
        $uuid = Uuid::random();
        $string = $uuid->value();
        $this->assertEquals(strlen($string),36);
    }
}