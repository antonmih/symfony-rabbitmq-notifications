<?php

declare(strict_types=1);

namespace App\Infrastructure\Symfony\Exception;

use Symfony\Component\HttpFoundation\JsonResponse;
use Throwable;

class ExceptionController
{
    public function show(Throwable $exception): JsonResponse
    {
        return new JsonResponse([
            'exception' => get_class($exception),
            'message' => $exception->getMessage(),
            'code' => $exception->getCode(),
            'trace' => $exception->getTrace(),
        ]);
    }
}