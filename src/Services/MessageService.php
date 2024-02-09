<?php

declare(strict_types = 1);

namespace App\Services;

use App\DTO\MessageInput;
use App\Entity\Message;
use App\Repository\MessageRepository;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;

class MessageService
{
    public function __construct(
        private MessageRepository $messageRepository,
    ) {
    }

    public function createMessage(MessageInput $messageInput): string
    {
        $hash = $this->generateHash($messageInput->getData());
        $message = (new Message)
            ->setHash($hash)
            ->setData($messageInput->getData())
        ;

        try {
            $this->messageRepository->save($message);
        } catch (UniqueConstraintViolationException $exception) {
            $this->createMessage($messageInput);
        }

        return $hash;
    }

    private function generateHash(string $data): string
    {
        return sha1($data . time());
    }
}