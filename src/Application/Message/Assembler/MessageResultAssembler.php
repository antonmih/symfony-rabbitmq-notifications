<?php

namespace App\Application\Message\Assembler;

use App\Application\Message\Dto\MessageResponseDto;
use App\Domain\Entity\Message;

class MessageResultAssembler implements MessageResultAssemblerInterface
{
    public function assemble(Message $message): MessageResponseDto
    {
        $dto = new MessageResponseDto();
        $dto->status = (string) $message->getStatus();
        return $dto;
    }
}