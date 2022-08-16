<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject;

use App\Domain\Exception\DomainException;
use App\Domain\Traits\StringValueObjectTrait;

class MessageType
{
    use StringValueObjectTrait;

    public const TYPE_EMAIL = 'email';
    public const TYPE_TINKOFF_PULSE = 'tinkoff_pulse';

    public const AVAILABLE_TYPES = [
        self::TYPE_EMAIL => self::TYPE_EMAIL,
        self::TYPE_TINKOFF_PULSE => self::TYPE_TINKOFF_PULSE,
    ];

    protected function checkValue(string $value): void
    {
        if (!in_array($value, self::AVAILABLE_TYPES)) {
            throw new DomainException('This type is not supported');
        }
    }

    public function isEmail(): bool
    {
        return $this->value === self::TYPE_EMAIL;
    }

    public function isTinkoffPulse(): bool
    {
        return $this->value === self::TYPE_TINKOFF_PULSE;
    }
}