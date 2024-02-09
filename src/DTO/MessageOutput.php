<?php

declare(strict_types=1);

namespace App\DTO;

class MessageOutput
{
    private string $hash;

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(?string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }
}
