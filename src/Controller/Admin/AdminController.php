<?php

namespace App\Controller\Admin;

//APPEL LES ENTITIES
use App\Entity\User;
use App\Entity\Astuces;
use App\Entity\Challenges;
use App\Entity\Energydatas;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AdminController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Pirates');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('User', 'fas fa-user', User::class);
        yield MenuItem::linkToCrud('Challenges', 'fab fa-sketch', Challenges::class);
        yield MenuItem::linkToCrud('Astuces', 'fab fa-creative-commons-share', Astuces::class);
        yield MenuItem::linkToCrud('Datas', 'fas fa-database', Energydatas::class);
    }
}
