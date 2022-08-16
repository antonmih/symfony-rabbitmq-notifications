<?php

declare(strict_types=1);

namespace App\Infrastructure\Doctrine\Repository;

use App\Domain\Entity\Message;
use App\Domain\Entity\ValueObject\Id;
use App\Domain\Repository\MessageRepositoryInterface;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Ramsey\Uuid\Uuid;

class MessageRepository extends ServiceEntityRepository implements MessageRepositoryInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Message::class);
    }

    public function save(Message $message): void
    {
       $this->getEntityManager()->persist($message);
       $this->getEntityManager()->flush();
    }

    public function getNextIdentity(): Id
    {
        $uuid = Uuid::uuid4();

        return new Id($uuid->toString());
    }
}