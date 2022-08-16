<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Entity\ValueObject\Status;
use App\Domain\Exception\DomainException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

class StatusType extends Type
{
    /**
     * @var string
     */
    private const NAME = 'status';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getVarcharTypeDeclarationSQL($column);
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
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Status
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof Status) {
            return $value;
        }

        try {
            if (!is_string($value)) {
                throw new DomainException('Invalid value type');
            }

            $status = new Status($value);
        } catch (DomainException $e) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return $status;
    }
}