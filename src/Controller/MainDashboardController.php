<?php

namespace App\Controller;

use App\Repository\SupplierRepository;
use App\Repository\RestaurateurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainDashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'my_dashboard')]
    public function index(SupplierRepository $supplierRepository, RestaurateurRepository $restaurateurRepository)
    {
        $totalSuppliers = $supplierRepository->count([]);
        $totalRestaurateurs = $restaurateurRepository->count([]);

        return $this->render('supplier/dashboard/index.html.twig', [
            'totalSuppliers' => $totalSuppliers,
            'totalRestaurateurs' => $totalRestaurateurs,
        ]);
    }
}