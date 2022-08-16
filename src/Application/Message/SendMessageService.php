<?php

declare(strict_types=1);

namespace App\Application\Message;

use App\Application\Message\Dto\MessageRequestDto;
use App\Domain\Message\SendMessage;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;

class SendMessageService
{
    public function __construct(
        private MessageBusInterface $bus
    ) {
    }

    public function sendMessage(MessageRequestDto $dto): bool
    {
        $sendMessage = new SendMessage($dto->content, $dto->type, $dto->user_id);
        $this->bus->dispatch(new Envelope($sendMessage));
        return true;
    }
}