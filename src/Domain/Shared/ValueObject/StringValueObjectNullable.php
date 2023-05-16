<?php

declare(strict_types=1);

namespace App\Domain\Shared\ValueObject;


use App\Domain\Shared\Exception\DomainException;
use App\Domain\Shared\Exception\ExceptionsFactory;

abstract class StringValueObjectNullable
{
    protected ?string $value;

    function getObjectName(): string
    {
        return substr(strrchr(get_class($this), '\\'), 1);
    }

    public function __construct(?string $value)
    {
        $this->value = $value;
    }

    public function value(): ?string
    {
        return $this->value;
    }

    /**
     * @throws DomainException
     */
    public function ensureNotEmpty(?string $value): void
    {
        if($value != null && $value == ""){
            throw ExceptionsFactory::wrongArgument($this->getObjectName()." must not be empty", 401);
        }
    }


    /**
     * @throws DomainException
     */
    public function ensureMinLength(?string $value, int $length): void
    {
        if ($value != null && strlen($value) < $length) {
            throw ExceptionsFactory::wrongArgument($this->getObjectName()."  must have at least $length characters", 401);
        }
    }

    /**
     * @throws DomainException
     */
    public function ensureMaxLength(?string $value, int $length): void
    {
        if ($value != null && grapheme_strlen($value) > $length) { //due to emojis presence
            throw ExceptionsFactory::wrongArgument($this->getObjectName()." must have a max of $length characters", 401);
        }
    }

}
