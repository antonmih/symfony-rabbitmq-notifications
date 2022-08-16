<?php

declare(strict_types=1);

namespace App\Application\Message;

use App\Application\Message\Assembler\MessageResultAssemblerInterface;
use App\Application\Message\Dto\MessageRequestDto;
use App\Application\Message\Dto\MessageResponseDto;
use App\Domain\UseCase\CreateMessageUseCase;

class MessageService
{
    public function __construct(
        private CreateMessageUseCase $createMessageUseCase,
        private MessageResultAssemblerInterface $messageResultAssembler
    ) {
    }

    public function createMessage(MessageRequestDto $dto): MessageResponseDto
    {
        $message = $this->createMessageUseCase->execute($dto->content, $dto->type, $dto->user_id);
        return $this->messageResultAssembler->assemble($message);
    }
}