<?php

namespace App\Controller\Admin;

use App\Entity\Calendrier;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Couvert;
use App\Entity\Categorie;
use App\Entity\Formule;
use App\Entity\Menu;
use App\Entity\Reservation;
use App\Entity\Produit;
use App\Entity\Allergene;
use App\Entity\User;


class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        return $this->render('admin/dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Quai Antique')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linktoRoute('Retourner sur le site', 'fas fa-arrow-right-from-bracket', 'app_home');

        yield MenuItem::section('Planning');
        yield MenuItem::linkToCrud('Réservations', 'fas fa-list',  Reservation::class);

        yield MenuItem::section('Parametres');
        yield MenuItem::linkToCrud('Allergenes', 'fas fa-viruses',  Allergene::class);
        yield MenuItem::linkToCrud('Nombre de couvert', 'fas fa-utensils',  Couvert::class);
        yield MenuItem::linkToCrud('Horaires', 'fas fa-clock',  Calendrier::class);

        yield MenuItem::section('Carte');
        yield MenuItem::linkToCrud('Menus', 'fas fa-book',  Menu::class);
        yield MenuItem::linkToCrud('Formules', 'fas fa-bowl-food',  Formule::class);
        yield MenuItem::linkToCrud('Catégories', 'fas fa-layer-group',  Categorie::class);
        yield MenuItem::linkToCrud('Produits', 'fas fa-cheese',  Produit::class);

        yield MenuItem::section('Utilisateurs');
        yield MenuItem::linkToCrud('Clients', 'fas fa-user',  User::class);

    }
    
}
