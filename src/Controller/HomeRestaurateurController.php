<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeRestaurateurController extends AbstractController
{
    #[Route('/home/restaurateur', name: 'app_home_restaurateur')]
    public function index(): Response
    {
        return $this->render('home_restaurateur/index.html.twig', [
            'controller_name' => 'HomeRestaurateurController',
        ]);
    }
}
