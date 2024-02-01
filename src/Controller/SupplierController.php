<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Supplier;
use App\Form\SupplierType;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class SupplierController extends AbstractController
{
    #[Route('/supplier', name: 'Supplier')]
    public function newSupplier(Request $request, EntityManagerInterface $manager): Response
    {
        $supplier = new Supplier();
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($supplier);

            $manager->flush();

            $this->addFlash('success', 'Fournisseur correctement enregistrée !');
            return $this->redirectToRoute('app_home');
        }

        return $this->render('supplier/index.html.twig', [
            'formSupplier' => $form->createView()
   ]);
    }
}
