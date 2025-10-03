<?php

namespace App\Controller\Admin;
use App\Entity\Users;
use App\Entity\Category;
use App\Entity\Collections;
use App\Entity\Favorite;
use App\Entity\Manga;
use App\Entity\Review;
use App\Entity\Status;
use EasyCorp\Bundle\EasyAdminBundle\Attribute\AdminDashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

#[AdminDashboard(routePath: '/admin', routeName: 'admin')]
class DashboardController extends AbstractDashboardController
{
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(UsersCrudController::class)->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('App');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linktoRoute('Back to the website', 'fas fa-home', 'homepage');
        yield MenuItem::linkToCrud('Users', 'fas fa-map-marker-alt', Users::class);
        yield MenuItem::linkToCrud('Categories', 'fas fa-tags', Category::class);
        yield MenuItem::linkToCrud('Collections', 'fas fa-folder', Collections::class);
        yield MenuItem::linkToCrud('Favorites', 'fas fa-heart', Favorite::class);
        yield MenuItem::linkToCrud('Manga', 'fas fa-book', Manga::class);
        yield MenuItem::linkToCrud('Reviews', 'fas fa-star', Review::class);
        yield MenuItem::linkToCrud('Status', 'fas fa-check', Status::class);
    }
}