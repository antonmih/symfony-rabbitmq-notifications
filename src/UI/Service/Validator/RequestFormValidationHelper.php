<?php

declare(strict_types=1);

namespace App\UI\Service\Validator;

use App\Application\Exception\ValidationException;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;

class RequestFormValidationHelper
{
    public function validate(FormInterface $form): void
    {
        if (!$form->isValid()) {
            $errors = $this->getErrorsMessages($form);
            throw new ValidationException(
                'Ошибка заполнения формы',
                Response::HTTP_BAD_REQUEST,
                null,
                $errors
            );
        }
    }

    private function getErrorsMessages(FormInterface $form): array
    {
        $errors = [];
        $formName = $form->getName();

        foreach ($form->getErrors(true, true) as $error) {
            $elementName = $error->getOrigin()?->getName();

            if ($elementName === null) {
                continue;
            }

            if ($elementName !== $formName) {
                $elementName = $formName . '_' . $elementName;
            }
            $errors[$elementName] = $error->getMessage();
        }

        return $errors;
    }
}
