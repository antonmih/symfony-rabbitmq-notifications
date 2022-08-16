<?php

declare(strict_types=1);

namespace App\UI\Service\Response;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ResponseFactory
{
    public static function createOkResponse(
        object|array $data = [],
        string $message = '',
        int $code = Response::HTTP_OK
    ): Response {
        return static::createJsonResponse(
            [
                'message' => $message,
                'data' => $data,
            ],
            $code
        );
    }

    public static function createErrorResponse(
        string $message = '',
        array $data = [],
        int $code = Response::HTTP_BAD_REQUEST
    ): Response {
        return static::createJsonResponse(
            [
                'message' => $message,
                'data' => $data,
            ],
            $code
        );
    }

    private static function createJsonResponse(array $data, int $code): JsonResponse
    {
        return new JsonResponse($data, $code);
    }
}
