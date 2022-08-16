<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Entity\ValueObject\MessageType as MType;
use App\Domain\Exception\DomainException;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

class MessageType extends Type
{
    /**
     * @var string
     */
    private const NAME = 'messageType';

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
    public function convertToPHPValue($value, AbstractPlatform $platform): ?MType
    {
        if ($value === null) {
            return null;
        }

        if ($value instanceof MType) {
            return $value;
        }

        try {
            if (!is_string($value)) {
                throw new DomainException('Invalid value type');
            }

            $type = new MType($value);
        } catch (DomainException $e) {
            throw ConversionException::conversionFailed($value, self::NAME);
        }

        return $type;
    }
}