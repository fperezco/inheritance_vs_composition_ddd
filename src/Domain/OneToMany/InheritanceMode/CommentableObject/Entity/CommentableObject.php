<?php

namespace App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity;

use App\Domain\Shared\ValueObject\Uuid;

abstract class CommentableObject
{
    private Uuid $uuid;
    public function __construct(Uuid $uuid)
    {
        $this->uuid = $uuid;
        $this->comments = [];
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
    }

}