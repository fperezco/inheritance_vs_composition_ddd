<?php

namespace App\Domain\OneToMany\InheritanceMode\VideoInheritance\Entity;



use App\Domain\OneToMany\InheritanceMode\CommentableObject\Entity\CommentableObject;
use App\Domain\Shared\ValueObject\Uuid;

class VideoInheritance extends CommentableObject
{
    private string $link;
    private float $duration;

    /**
     * @param Uuid $uuid
     * @param string $link
     * @param float $duration
     */
    public function __construct(Uuid $uuid,string $link, float $duration)
    {
        $this->link = $link;
        $this->duration = $duration;
        parent::__construct($uuid);
    }


    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     */
    public function setLink(string $link): void
    {
        $this->link = $link;
    }

    /**
     * @return float
     */
    public function getDuration(): float
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     */
    public function setDuration(float $duration): void
    {
        $this->duration = $duration;
    }

}