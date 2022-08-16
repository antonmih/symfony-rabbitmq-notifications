<?php

declare(strict_types=1);

namespace App\UI\Repository;

use App\UI\Entity\EasyAdminMessage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class EasyAdminMessageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EasyAdminMessage::class);
    }
}