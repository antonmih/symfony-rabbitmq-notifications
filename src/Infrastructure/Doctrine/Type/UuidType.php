<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Type;

use App\Domain\Entity\ValueObject\Id;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Ramsey\Uuid\Doctrine\UuidType as BaseUuidType;

class UuidType extends BaseUuidType
{
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return !$platform->hasNativeGuidType();
    }

    /** @psalm-suppress InvalidReturnType */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Id
    {
        $result = parent::convertToPHPValue($value, $platform);
        /** @psalm-suppress InvalidReturnStatement */
        return $result === null ? null : new Id((string) $result);
    }
}
