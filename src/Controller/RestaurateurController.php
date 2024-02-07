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
    #[Route('/inscription/restaurateur', name: 'app_form_restaurateur')]
    public function index(Request $request, EntityManagerInterface $manager): Response
    {

        $restaurateur = new Restaurateur();
        $restaurateur->setPremium(false); // Par défaut, la version de base
        $form = $this->createForm(RestaurateurType::class, $restaurateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($restaurateur);

            $manager->flush();
        
            $this->addFlash('success', 'Le formulaire a bien été envoyé !'); // Flash vert pour succès
            //return $this->redirectToRoute('app_home');

           //dd($restaurateur);
        } else {
            $this->addFlash('error', 'Le formulaire n\'a pas été envoyé. Veuillez vérifier vos informations.'); // Flash rouge pour erreur
        }

        return $this->render('home_restaurateur/index.html.twig', [
            'formRestaurateur' => $form->createView(), // Utilisez createView() pour obtenir la vue du formulaire
        ]);

    }

    #[Route('/home/supplier', name: 'app_home_supplier')]
    public function homeRestaurateur(): Response
    {
        return $this->render('home_supplier/index.html.twig', [
            'controller_name' => 'HomeSupplierController',
        ]);
    }

}
