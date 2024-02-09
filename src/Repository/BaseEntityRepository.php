<?php

declare(strict_types=1);

namespace App\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

abstract class BaseEntityRepository extends ServiceEntityRepository
{
    private ManagerRegistry $registry;

    public function __construct(ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);

        $this->registry = $registry;
    }

    public function save(object $entity): void
    {
        if (!$this->getEntityManager()->isOpen()) {
            $this->registry->resetManager();
        }

        $this->getEntityManager()->persist($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param array<object> $entities
     */
    public function saveBatch(array $entities): void
    {
        foreach ($entities as $entity) {
            $this->getEntityManager()->persist($entity);
        }

        $this->getEntityManager()->flush();
    }

    public function remove(object$entity): void
    {
        $this->getEntityManager()->remove($entity);
        $this->getEntityManager()->flush();
    }

    /**
     * @param array<object> $entities
     */
    public function removeBatch(array$entities): void
    {
        foreach ($entities as $entity) {
            $this->getEntityManager()->remove($entity);
        }

        $this->getEntityManager()->flush();
    }

    public function performTransaction(callable $callback): void
    {
        $this->getEntityManager()->wrapInTransaction($callback);
    }
}
