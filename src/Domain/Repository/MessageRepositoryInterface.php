<?php

declare(strict_types=1);

namespace App\Domain\Repository;

use App\Domain\Entity\Message;
use App\Domain\Entity\ValueObject\Id;

interface MessageRepositoryInterface
{
    public function save(Message $message): void;

    public function getNextIdentity(): Id;
}