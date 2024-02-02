<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Restaurateur;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use App\Form\RestaurateurType;

class RestaurateurController extends AbstractController
{
    #[Route('/restaurateur/inscription', name: 'app_form_restaurateur')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {

        $restaurateur = new Restaurateur();
        $form = $this->createForm(RestaurateurType::class, $restaurateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($restaurateur);

            $manager->flush();

            // Redirigez vers la page d'accueil après l'ajout du produit
            return $this->redirectToRoute('home_restaurateur');
        }

        return $this->render('home_restaurateur/index.html.twig', [
            'formRestaurateur' => $form->createView(), // Utilisez createView() pour obtenir la vue du formulaire
        ]);
        
    }

    #[Route('/restaurateur/home', name: 'home_restaurateur')]
    public function homeRestaurateur(): Response
    {
        return $this->render('home_restaurateur/index.html.twig', [
            'controller_name' => 'HomeRestaurateurController',
        ]);
    }

}
