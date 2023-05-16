<?php

namespace App\Domain\OneToMany\CompositionMode\VideoComposition\Entity;


use App\Domain\OneToMany\CompositionMode\CommentComposition\CommentableCompositionInterface;
use App\Domain\OneToMany\CompositionMode\CommentComposition\ValueObject\CommentParentId;
use App\Domain\Shared\ValueObject\Uuid;

class VideoComposition implements CommentableCompositionInterface
{
    private string $link;
    private float $duration;
    private Uuid $uuid;

    /**
     * @param Uuid $uuid
     * @param string $link
     * @param float $duration
     */
    public function __construct(Uuid $uuid,string $link, float $duration)
    {
        $this->link = $link;
        $this->duration = $duration;
        $this->uuid = $uuid;
    }

    /**
     * This is the only method that interface CommentableCompositionInterface forces you to implement if you want to be able to
     * receive comments
     * @return CommentParentId
     */
    public function commentParentId(): CommentParentId
    {
        return new CommentParentId($this->getUuid()->value(), VideoComposition::class);
    }

    /**
     * @return Uuid
     */
    public function getUuid(): Uuid
    {
        return $this->uuid;
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