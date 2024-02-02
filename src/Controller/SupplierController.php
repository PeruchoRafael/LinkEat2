<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Supplier;
use App\Form\SupplierType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Persistence\ManagerRegistry;
use App\Entity\Product;
use App\Form\ProductType;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as ExceptionNotFoundHttpException;
use App\Repository\ProductRepository;

class SupplierController extends AbstractController
{
    #[Route('/fournisseur/inscription', name: 'app_form_supplier')]
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

        return $this->render('supplier/new.html.twig', [
            'formSupplier' => $form->createView()
   ]);
    }

    #[Route('/supplier/home', name: 'app_home_supplier')]
    public function index(): Response
    {
        return $this->render('supplier/index.html.twig', [
            'controller_name' => 'HomeSupplierController',
        ]);
    }

    #[Route('/product/list', name: 'app_products')]
public function produit(ProductRepository $productRepository, Security $security): Response
{
    // Obtenez l'utilisateur connecté
    $supplier = $security->getUser();

    // Assurez-vous que l'utilisateur est un fournisseur
    if (!$supplier || !($supplier instanceof Supplier)) {
        throw new \Exception("Accès refusé");
    }

    // Utilisez le repository pour trouver les produits liés au fournisseur connecté
    $products = $productRepository->findBySupplier($supplier);

    return $this->render('supplier/product/index.html.twig', [
        'controller_name' => 'HomeSupplierController',
        'products' => $products
    ]);
}

    #[Route(path: '/product-edit/{id}', name: 'product_edit')]
    public function productEdit(EntityManagerInterface $manager,ManagerRegistry $managerRegistry,Request $request, string $id): Response
    {
        $product = $managerRegistry->getRepository(Product::class)->find($id);

        // Si le produit est null (donc non trouvé en BDD, alors on génère une 404).
        if (null === $product) {
            throw new ExceptionNotFoundHttpException();
        }

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $manager->flush();
            return $this->redirectToRoute('app_home_supplier');
        }

        return $this->render('supplier/product/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView(),
        ]);
    }

    #[Route('/product/new', name: 'product_new')]
    public function new(Request $request, Security $security, EntityManagerInterface $manager): Response
    {
        $product = new Product();
        
        // Obtenez l'utilisateur connecté (fournisseur)
        $supplier = $security->getUser();
        
        // Vérifiez si l'utilisateur est un Supplier avant de continuer
       #{ if (!$supplier || !($supplier instanceof \App\Entity\Supplier)) {
            // Gérer l'erreur ou rediriger l'utilisateur si nécessaire
            #return $this->redirectToRoute('some_route');
        #}
        
        // Attribuer le fournisseur connecté au produit
        $product->setSupplier($supplier);

        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $manager->persist($product);
            $manager->flush();

            // Rediriger vers une route appropriée après l'ajout
            return $this->redirectToRoute('app_home_supplier');
        }

        return $this->render('supplier/product/new.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route(path: '/product-delete/{id}', name: 'product_delete')]
public function delete(EntityManagerInterface $manager, string $id): Response
{
    $product = $manager->getRepository(Product::class)->find($id);

    // Si le produit est null (donc non trouvé en BDD, alors on génère une 404).
    if (null === $product) {
        throw new ExceptionNotFoundHttpException();
    }

    // Ajoutez ici votre logique de confirmation, si nécessaire

    // Si la confirmation est reçue (par exemple, via un formulaire de confirmation)
    // vous pouvez ajouter une vérification ici

    // Supprimez le produit
    $manager->remove($product);
    $manager->flush();

    $this->addFlash('success', 'Le produit a été supprimé avec succès.');

    return $this->redirectToRoute('app_home_supplier');
}

}
