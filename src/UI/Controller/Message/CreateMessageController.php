<?php

declare(strict_types=1);

namespace App\UI\Controller\Message;

use App\Application\Exception\ValidationException;
use App\Application\Message\Dto\MessageRequestDto;
use App\Application\Message\MessageService;
use App\Application\Message\SendMessageService;
use App\Domain\Message\SendMessage;
use App\UI\Controller\Message\Validation\MessageValidationForm;
use App\UI\Service\Response\ResponseFactory;
use App\UI\Service\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateMessageController extends AbstractController
{
    public function __construct(
        private ValidatorInterface $validator,
        private SendMessageService $messageService
    )
    {
    }

    /**
     * @Route("/create/message", methods={"POST"})
     */
    public function __invoke(Request $request): Response
    {
        $dto = new MessageRequestDto();
        try {
            $this->validator->validate(MessageValidationForm::class, $request->request->all(), $dto);
        } catch (ValidationException $e) {
            return ResponseFactory::createErrorResponse($e->getMessage(), $e->getErrors());
        }
        $this->messageService->sendMessage($dto);
        return ResponseFactory::createOkResponse($dto, 'succes');
    }
}