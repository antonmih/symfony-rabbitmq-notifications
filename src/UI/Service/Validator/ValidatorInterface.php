<?php

declare(strict_types=1);

namespace App\UI\Service\Validator;

use App\Application\Exception\ValidationException;
use Symfony\Component\Form\FormTypeInterface;

interface ValidatorInterface
{
    /**
     * @throws ValidationException
     *
     * @psalm-param class-string<FormTypeInterface> $formClass
     */
    public function validate(string $formClass, array $data, ?object $model = null): void;
}
