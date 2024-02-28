<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Entity\Supplier;
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

            $this->addFlash('success', 'Le formulaire a bien été envoyé !');
            //return $this->redirectToRoute('app_home');
        } else {
            $this->addFlash('error', 'Le formulaire n\'a pas été envoyé. Veuillez vérifier vos informations.');
        }

        return $this->render('restaurateur/new.html.twig', [
            'formRestaurateur' => $form->createView(),
        ]);
    }




    #[Route('/restaurateur/home', name: 'app_home_restaurateur')]
    public function homeRestaurateur(): Response
    {
        return $this->render('restaurateur/index.html.twig', [
            'controller_name' => 'RestaurateurController',
        ]);
    }

    #[Route('/restaurateur/fournisseur', name: 'fournisseurs')]
    public function fournisseurRestaurateur(EntityManagerInterface $entityManager): Response
    {
        // Utilisez entityManager pour obtenir le dépôt de l'entité Supplier directement
        $fournisseurs = $entityManager->getRepository(Supplier::class)->findAll();

        return $this->render('restaurateur/fournisseur.html.twig', [
            'fournisseurs' => $fournisseurs,
        ]);
    }
}
