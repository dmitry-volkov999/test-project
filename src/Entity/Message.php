<?php

declare(strict_types = 1);

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ApiResource(
    operations: [
        new Get(),
    ]
)]
#[ORM\Entity(repositoryClass: MessageRepository::class)]
#[ORM\Table('message')]
class Message
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'string', nullable: false)]
    private string $hash;

    #[ORM\Column(name: 'data', type: 'string', nullable: false)]
    private string $data;

    public function getHash(): string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getData(): ?string
    {
        return $this->data;
    }

    public function setData(string $data): self
    {
        $this->data = $data;

        return $this;
    }
}
