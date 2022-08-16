<?php

declare(strict_types=1);

namespace App\Domain\UseCase;

use App\Domain\Entity\Message;
use App\Domain\Entity\ValueObject\MessageType;
use App\Domain\Entity\ValueObject\Retry;
use App\Domain\Entity\ValueObject\Status;
use App\Domain\Repository\MessageRepositoryInterface;

class CreateMessageUseCase
{
    public function __construct(
        private MessageRepositoryInterface $messageRepository
    ) {
    }

    public function execute(string $content, string $type, int $user_id = null): Message
    {
        $message = new Message($this->messageRepository->getNextIdentity(), $content, new MessageType($type), new Status('manual'), new Retry(0), $user_id);
        $this->messageRepository->save($message);
        return $message;
    }
}