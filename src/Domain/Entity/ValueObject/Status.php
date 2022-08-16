<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject;

use App\Domain\Exception\DomainException;
use App\Domain\Traits\StringValueObjectTrait;

class Status
{
    use StringValueObjectTrait;

    public const STATUS_MANUAL = 'manual';
    public const STATUS_WAITING = 'waiting';
    public const STATUS_SUCCESS = 'success';
    public const STATUS_FAILED = 'failed';

    public const AVAILABLE_TYPES = [
        self::STATUS_MANUAL => self::STATUS_MANUAL,
        self::STATUS_WAITING => self::STATUS_WAITING,
        self::STATUS_SUCCESS => self::STATUS_SUCCESS,
        self::STATUS_FAILED => self::STATUS_FAILED,
    ];

    protected function checkValue(string $value): void
    {
        if (!in_array($value, self::AVAILABLE_TYPES)) {
            throw new DomainException('This status is not supported');
        }
    }

    public function isManual(): bool
    {
        return $this->value === self::STATUS_MANUAL;
    }

    public function isWaiting(): bool
    {
        return $this->value === self::STATUS_WAITING;
    }

    public function isSuccess(): bool
    {
        return $this->value === self::STATUS_SUCCESS;
    }

    public function isFailed(): bool
    {
        return $this->value === self::STATUS_FAILED;
    }
}