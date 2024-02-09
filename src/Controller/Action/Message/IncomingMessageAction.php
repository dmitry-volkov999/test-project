<?php

declare(strict_types=1);

namespace App\Controller\Action\Message;

use ApiPlatform\Validator\ValidatorInterface;
use App\DTO\MessageInput;
use App\DTO\MessageOutput;
use App\Services\MessageService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class IncomingMessageAction extends AbstractController
{
    public function __construct(
        private ValidatorInterface $validator,
        private MessageService $messageService,
    ) {
    }

    public function __invoke(MessageInput $messageInput): MessageOutput
    {
        $this->validator->validate($messageInput);

        $hash = $this->messageService->createMessage($messageInput);

        return (new MessageOutput())->setHash($hash);
    }
}
