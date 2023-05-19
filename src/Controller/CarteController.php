<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use App\Repository\CategorieRepository;
use App\Repository\FormuleRepository;
use App\Repository\MenuRepository;
use App\Repository\PlatRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarteController extends AbstractController
{
    #[Route('/carte', name: 'app_carte')]
    public function index(CalendrierRepository $repositeryCal,CategorieRepository $repositeryCat, FormuleRepository $repositeryFor,
    MenuRepository $repositeryMen,PlatRepository $repositeryPla): Response
    {
        $calendriers = $repositeryCal->findAll();
        $categories = $repositeryCat->findAll();
        $formules = $repositeryFor->findAll();
        $menus = $repositeryMen->findAll();
        $plats = $repositeryPla->findAll();
        return $this->render('carte/index.html.twig', [
            'calendriers' => $calendriers,
            'categories' => $categories,
            'formules' => $formules,
            'menus' => $menus,
            'plats' => $plats,
        ]);
    }
}
