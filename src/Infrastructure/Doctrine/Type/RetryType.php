<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;
use App\Domain\Entity\ValueObject\Retry;
use App\Domain\Exception\DomainException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

class RetryType extends Type
{
    /**
     * @var string
     */
    private const NAME = 'retry';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getIntegerTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @param mixed $value
     *
     * @throws ConversionException
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Retry
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Retry) {
            return $value;
        }

        try {
            if (!is_int($value)) {
                throw new DomainException('Invalid value type');
            }

            $retry = new Retry($value);
        } catch (DomainException $e) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return $retry;
    }
}