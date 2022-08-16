<?php

declare(strict_types=1);

namespace App\Domain\Traits;

trait IntValueObjectTrait
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->checkValue($value);
        $this->value = $value;
    }

    public function __toString()
    {
        return (string) $this->value;
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function isEqual(self $valueObject): bool
    {
        return $this->getValue() === $valueObject->getValue();
    }

    protected function checkValue(int $value): void
    {
    }
}