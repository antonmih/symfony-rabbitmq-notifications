<?php

declare(strict_types=1);

namespace App\UI\Controller\Admin;

use App\UI\Entity\EasyAdminMessage;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\UserMenu;
use Symfony\Component\Security\Core\User\UserInterface;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(MessageCrudController::class)->generateUrl());
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()->setTitle('Notificator');
    }

    public function configureUserMenu(UserInterface $user): UserMenu
    {
        return UserMenu::new()->displayUserAvatar(false);
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Notificator', 'fa fa-home');
        yield MenuItem::section('Сообщения');
        yield MenuItem::linkToCrud('Сообщения', 'fa fa-file-email', EasyAdminMessage::class);
    }
}