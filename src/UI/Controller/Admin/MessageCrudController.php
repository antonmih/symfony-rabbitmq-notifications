<?php

declare(strict_types=1);

namespace App\UI\Controller\Admin;

use App\Domain\Repository\MessageRepositoryInterface;
use App\UI\Entity\EasyAdminMessage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class MessageCrudController extends AbstractCrudController
{
    public function __construct(private MessageRepositoryInterface $messageRepository)
    {
    }

    public static function getEntityFqcn(): string
    {
        return EasyAdminMessage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle(Crud::PAGE_INDEX, 'Сообщения')
            ->setPageTitle(Crud::PAGE_EDIT, 'Сообщение')
            ->setSearchFields(null)
            ->setDateTimeFormat('dd.MM.Y H:m:ss');
    }

    public function createEntity(string $entityFqcn): EasyAdminMessage
    {
        $entity = new EasyAdminMessage();
        $entity->setId($this->messageRepository->getNextIdentity());
        return $entity;
    }
}