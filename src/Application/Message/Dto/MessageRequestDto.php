<?php

declare(strict_types=1);

namespace App\Application\Message\Dto;

class MessageRequestDto
{
    public string $content = '';
    public string $type = '';
    public int $user_id = 0;
}