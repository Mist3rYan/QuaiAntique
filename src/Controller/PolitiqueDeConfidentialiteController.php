<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PolitiqueDeConfidentialiteController extends AbstractController
{
    #[Route('/politique/de/confidentialite', name: 'app_politique_de_confidentialite')]
    public function index(CalendrierRepository $repositery): Response
    {
        $calendriers = $repositery->findAll();
        
        return $this->render('politique_de_confidentialite/index.html.twig', [
            'calendriers' => $calendriers,
        ]);
    }
}
