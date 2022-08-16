<?php

declare(strict_types=1);

namespace App\Application\Message\Assembler;

use App\Application\Message\Dto\MessageResponseDto;
use App\Domain\Entity\Message;

interface MessageResultAssemblerInterface
{
    public function assemble(Message $message): MessageResponseDto;
}