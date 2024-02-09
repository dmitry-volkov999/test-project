<?php

declare(strict_types = 1);

namespace App\Repository;

use App\Entity\Message;
use Doctrine\Persistence\ManagerRegistry;

class MessageRepository extends BaseEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }
}