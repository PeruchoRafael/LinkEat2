<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilRestaurateurController extends AbstractController
{
    #[Route('/accueil/restaurateur', name: 'app_accueil_restaurateur')]
    public function index(): Response
    {
        return $this->render('accueil_restaurateur/index.html.twig', [
            'controller_name' => 'AccueilRestaurateurController',
        ]);
    }
}
