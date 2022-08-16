<?php

declare(strict_types=1);

namespace App\Domain\Entity\ValueObject;

use App\Domain\Exception\DomainException;
use App\Domain\Traits\StringValueObjectTrait;

class Id
{
    use StringValueObjectTrait;

    protected function checkValue(string $value): void
    {
        if (empty($value)) {
            throw new DomainException('Id value must not be empty');
        }
    }
}
