<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Repository\AllergeneRepository;
use App\Security\UsersAuthenticator;
use App\Repository\CalendrierRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    
    #[Route('/inscription', name: 'app_register')]
    public function register(Request $request, UserAuthenticatorInterface $userAuthenticator, 
    UsersAuthenticator $authenticator, EntityManagerInterface $entityManager,
    CalendrierRepository $repositery,AllergeneRepository $repositeryAll): Response
    {
        $calendriers = $repositery->findAll();
        $allergenes = $repositeryAll->findAll();
        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user,
        ['allergenes' => $allergenes]);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $user->setRoles(['ROLE_USER']);
            foreach ($user->getAllergenes() as $allergene) {
                $entityManager->persist($allergene);
            }
            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email
            $this->addFlash('success', 'Votre compte a bien été créé !');
            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'calendriers' => $calendriers,
        ]);
    }
}
