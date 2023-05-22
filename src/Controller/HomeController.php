<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(CalendrierRepository $repositery, ProduitRepository $repositeryProd): Response
    {
        $calendriers = $repositery->findAll();
        $produits = $repositeryProd->findBy(['is_favorite'=>'1']);

        return $this->render('home/index.html.twig', [
            'calendriers' => $calendriers,
            'produits' => $produits,
        ]);
    }
}
