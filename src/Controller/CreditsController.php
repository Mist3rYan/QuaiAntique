<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CalendrierRepository;

class CreditsController extends AbstractController
{
    #[Route('/credits', name: 'app_credits')]
    public function index(CalendrierRepository $repositery): Response
    {
        $calendriers = $repositery->findAll();
        return $this->render('credits/index.html.twig', [
            'calendriers' => $calendriers,
        ]);
    }
}
