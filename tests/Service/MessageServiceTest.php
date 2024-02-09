<?php

declare(strict_types = 1);

namespace App\Tests\Service;

use App\DTO\MessageInput;
use App\Entity\Message;
use App\Services\MessageService;
use Doctrine\ORM\EntityManager;
use Psr\Container\ContainerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class MessageServiceTest extends KernelTestCase
{
    private ?EntityManager $entityManager;

    private ContainerInterface $container;

    protected function setUp(): void
    {
        self::bootKernel();

        $this->container = static::getContainer();
        $this->entityManager = static::getContainer()
            ->get('doctrine')
            ->getManager();
    }

    public function testSomething(): void
    {
        $dataString = 'data string';

        $messageService = $this->container->get(MessageService::class);
        $resultedHash = $messageService->createMessage(
            (new MessageInput())->setData($dataString)
        );

        $this->assertNotEmpty($resultedHash);

        $message = $this->entityManager
            ->getRepository(Message::class)
            ->findOneBy(['hash' => $resultedHash])
        ;

        $this->assertSame($dataString, $message->getData());
    }

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}