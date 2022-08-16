<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject;

use App\Domain\Exception\DomainException;
use App\Domain\Traits\IntValueObjectTrait;

class Retry
{
    use IntValueObjectTrait;

    protected function checkValue(int $value): void
    {
        if ($value < 0 || $value > 3) {
            throw new DomainException('Retry value must not be less than 0 and greater than 3');
        }
    }
}