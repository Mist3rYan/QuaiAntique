<?php

namespace App\Controller;

use App\Entity\Reservation;
use App\Form\ReservationType;
use App\Repository\CouvertRepository;
use App\Repository\AllergeneRepository;
use App\Repository\CalendrierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    #[Route('/reservation', name: 'app_reservation')]
    public function index(CouvertRepository $repositeryCouvert,  EntityManagerInterface $entityManager,Request $request,CalendrierRepository $repositery, AllergeneRepository $repositeryAll): Response
    {
        $calendriers = $repositery->findAll();
        $allergenes = $repositeryAll->findAll();
        $reservations = $entityManager->getRepository(Reservation::class)->findAll();
        $couverts = $repositeryCouvert->findOneBy(['id' => '1']);
        $nbCouvert = $couverts->getNbCouvert();
        $reservation = new Reservation();
        $form = $this->createForm(ReservationType::class, $reservation,[
            'allergenes' => $allergenes,
        ]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $reservation = $form->getData();
            foreach ($reservation->getAllergenes() as $allergene) {
                $entityManager->persist($allergene);
            }
            $entityManager->persist($reservation);
            $entityManager->flush();
            // do anything else you need here, like send an email
            $this->addFlash('success', 'Votre réservation a bien été enregistrée !');
            return $this ->redirectToRoute('app_home');
        }


        return $this->render('reservation/index.html.twig', [
            'reservationForm' => $form->createView(),
            'user' => $this->getUser(),
            'calendriers' => $calendriers,
            'nbCouvert' => $nbCouvert,
            'reservations' => $reservations,
        ]);
    }
}
