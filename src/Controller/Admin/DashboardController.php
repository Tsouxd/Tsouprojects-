<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Niala;
use App\Entity\Absence;
use App\Entity\Presence;
use App\Entity\FoodPlanning;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');;
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Fiche de présence');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Acceuil', 'fa fa-home');
        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
        yield MenuItem::linkToCrud('Liste des utilisateurs', 'fas fa-users', User::class);
        yield MenuItem::linkToCrud('Liste des présences', 'fas fa-list', Presence::class);
        yield MenuItem::linkToCrud('Liste des absences', 'fas fa-folder', Absence::class);
        yield MenuItem::linkToCrud('Liste des démissionnées', 'fas fa-trash', Niala::class);
        yield MenuItem::linkToCrud('Food planning', 'fas fa-user', FoodPlanning::class);
    }
}