<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\AllergeneRepository;
use App\Repository\CalendrierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/utilisateur/edition/{id}', name: 'app_user')]
    public function index(User $user, Request $request, EntityManagerInterface $manager, CalendrierRepository $repositery): Response
    {
        $calendriers = $repositery->findAll();

        if (!$this->getUser()) {
            return $this->redirectToRoute('app_login');
        }

        if ($this->getUser() !== $user) {
            return $this->redirectToRoute('app_login');
        }

        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $manager->persist($user);
            $manager->flush();

            $this->addFlash(
                'success',
                'Les informations de votre compe ont bien été modiifiées.'
            );
            }
            elseif ($form->isSubmitted() && !$form->isValid()){
                $this->addFlash(
                    'danger',
                    'Une erreur est survenue lors de la modification de votre compte.'
                );
            }
        return $this->render('user/index.html.twig', [
            'form' => $form->createView(),
            'calendriers' => $calendriers,
        ]);
    }
}
