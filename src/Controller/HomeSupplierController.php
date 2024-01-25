<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeSupplierController extends AbstractController
{
    #[Route('/home/supplier', name: 'app_home_supplier')]
    public function index(): Response
    {
        return $this->render('home_supplier/index.html.twig', [
            'controller_name' => 'HomeSupplierController',
        ]);
    }
}
