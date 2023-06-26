<?php

namespace App\Controller\Admin;

use App\Entity\Faq;
use App\Entity\Vin;
use App\Entity\Blog;
use App\Entity\User;
use App\Entity\Cepage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;

class DashboardController extends AbstractDashboardController
{
    private AdminUrlGenerator $adminUrlGenerator;

    public function __construct(AdminUrlGenerator $adminUrlGenerator)
    {
        $this->adminUrlGenerator = $adminUrlGenerator;
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {

        $url = $this->adminUrlGenerator
        ->setController(FaqCrudController::class)
        ->generateUrl();

         return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Inovin');
    }

    // public function configureActions(User $user): Actions
    // {
    //     // faut mettre ici pour enlever le delete/edit
    // }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');

        yield MenuItem::subMenu('FAQ', 'fas fa-question')->setSubItems([
            MenuItem::linkToCrud('Créer Question', 'fas fa-plus', Faq::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Question', 'fas fa-eye', Faq::class)
        ]);

        yield MenuItem::subMenu('Blog', 'fas fa-newspaper')->setSubItems([
            MenuItem::linkToCrud('Créer Article', 'fas fa-plus', Blog::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Article', 'fas fa-eye', Blog::class)
        ]);

        yield MenuItem::subMenu('Cepage', 'fas fa-wine-glass')->setSubItems([
            MenuItem::linkToCrud('Créer un Cépage', 'fas fa-plus', Cepage::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Voir Cépages', 'fas fa-eye', Cepage::class)
        ]);

        yield MenuItem::subMenu('Vin', 'fas fa-wine-bottle')->setSubItems([
            MenuItem::linkToCrud('Créer un Vin', 'fas fa-plus', Vin::class)->setAction(Crud::PAGE_NEW),
            // MenuItem::linkToCrud('Créer un Vin', 'fas fa-plus', Vin::class)->setAction(Crud::PAGE_DETAIL),
            MenuItem::linkToCrud('Voir Vins', 'fas fa-eye', Vin::class)
        ]);

        yield MenuItem::subMenu('User', 'fas fa-user')->setSubItems([
            MenuItem::linkToCrud('Voir Utilisateurs', 'fas fa-eye', User::class)
        ]);

        // yield MenuItem::linkToCrud('The Label', 'fas fa-list', EntityClass::class);
    }
}