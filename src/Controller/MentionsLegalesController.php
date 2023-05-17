<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MentionsLegalesController extends AbstractController
{
    #[Route('/mentions/legales', name: 'app_mentions_legales')]
    public function index(CalendrierRepository $repositery): Response
    {
        $calendriers = $repositery->findAll();
        
        return $this->render('mentions_legales/index.html.twig', [
            'calendriers' => $calendriers,
        ]);
    }
}
