<?php

declare(strict_types=1);

namespace App\Application\Exception;

use InvalidArgumentException;
use Throwable;

class ValidationException extends InvalidArgumentException implements ApplicationExceptionInterface
{
    protected array $errors;

    public function __construct(string $message = '', int $code = 0, ?Throwable $previous = null, array $errors = [])
    {
        $this->errors = $errors;
        parent::__construct($message, $code, $previous);
    }

    public function getErrors(): array
    {
        return $this->errors;
    }
}
