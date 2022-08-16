<?php

declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\ValueObject\Id;
use App\Domain\Entity\ValueObject\Retry;
use App\Domain\Entity\ValueObject\MessageType;
use App\Domain\Entity\ValueObject\Status;
use App\Domain\Traits\DateTimeFieldsTrait;

class Message
{
    use DateTimeFieldsTrait;

    public function __construct(
        private Id          $id,
        private string      $content,
        private MessageType $type,
        private Status      $status,
        private Retry       $retry,
        private ?int      $userId
    ) {

    }

    public function getId(): Id
    {
        return $this->id;
    }

    public function getContent(): string
    {
       return $this->content;
    }

    public function getType(): MessageType
    {
        return $this->type;
    }

    public function getStatus(): Status
    {
        return $this->status;
    }

    public function getRetry(): Retry
    {
        return $this->retry;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}