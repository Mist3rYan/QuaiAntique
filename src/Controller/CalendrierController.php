<?php

namespace App\Controller;

use App\Repository\CalendrierRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CalendrierController extends AbstractController
{
    #[Route('/Admin/Calendrier', name: 'app_calendrier')]
    public function index(CalendrierRepository $repositery): Response
    {
        $calendriers = $repositery->findAll();

        return $this->render('partials/_footer.html.twig', [
            'calendriers' => $calendriers
        ]);
    }
}