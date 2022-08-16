<?php

declare(strict_types=1);

namespace App\Domain\Message;

class SendMessage
{
    public function __construct(
        private string      $content,
        private string $type,
        private ?int      $userId
    ) {

    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getUserId(): ?int
    {
        return $this->userId;
    }
}