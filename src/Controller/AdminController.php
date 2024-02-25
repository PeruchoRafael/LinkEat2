<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        // Récupérer les utilisateurs depuis la base de données
        $users = $entityManager->getRepository(User::class)->findAll();

        // Passer les utilisateurs au modèle Twig pour affichage
        return $this->render('admin/admin.html.twig', [
            'users' => $users,
        ]);
    }
}