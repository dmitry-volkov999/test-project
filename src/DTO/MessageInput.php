<?php

declare(strict_types=1);

namespace App\DTO;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use App\Controller\Action\Message\IncomingMessageAction;
use Symfony\Component\Validator\Constraints as Assert;

#[ApiResource(
    operations: [
        new Post(
            controller: IncomingMessageAction::class,
        ),
    ]
)]
class MessageInput
{
    #[Assert\NotBlank()]
    #[Assert\NotNull()]
    private ?string $data;

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(?string $data): self
    {
        $this->data = $data;

        return $this;
    }
}
