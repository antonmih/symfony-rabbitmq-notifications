<?php

declare(strict_types=1);

namespace App\Domain\Handler;

use App\Domain\Message\SendMessage;
use App\Domain\UseCase\CreateMessageUseCase;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendMessageHandler implements MessageHandlerInterface
{
    public function __construct(
      private CreateMessageUseCase $createMessageUseCase
    ) {
    }

    public function __invoke(SendMessage $message)
    {
        $this->createMessageUseCase->execute($message->getContent(), $message->getType(), $message->getUserId());
    }
}