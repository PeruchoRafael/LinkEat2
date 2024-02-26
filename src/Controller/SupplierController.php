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
use App\Repository\OrderlineRepository;
use App\Repository\OrderRepository;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException as ExceptionNotFoundHttpException;
use App\Repository\ProductRepository;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Psr\Container\NotFoundExceptionInterface;


class SupplierController extends AbstractController
{

    private $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    #[Route('/inscription/fournisseur', name: 'app_form_supplier')]
    public function newSupplier(Request $request, EntityManagerInterface $manager): Response
    {
        $supplier = new Supplier();
        $form = $this->createForm(SupplierType::class, $supplier);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {

            if ( $form->isValid()) {
                try {

                    // Récupérer le mot de passe en texte brut à partir du formulaire
                    $plainPassword = $form->get('password')->getData();

                    // Hasher le mot de passe
                    $hashedPassword = $this->passwordHasher->hashPassword($supplier, $plainPassword);
                    $supplier->setPassword($hashedPassword);

                    $manager->persist($supplier);
    
                    $manager->flush();
        
                    $this->addFlash('success', 'Fournisseur correctement enregistrée !');
                    return $this->redirectToRoute('app_home');
                } catch (\Exception $e) {
                    $this->addFlash('error', 'Une erreur s\'est produire lors de l\'ajout...');
                }
            } else {
                $this->addFlash('error', 'Erreur sur la saisie, veuillez vérifier votre saisie...');
            }

           
            
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

    #[Route('/profile', name: 'my_profile')]
    public function profil(): Response
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
            return $this->redirectToRoute('app_products');
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

    private function createDeleteConfirmationForm(): \Symfony\Component\Form\FormInterface
    {
        return $this->createFormBuilder()
            ->add('confirm', SubmitType::class, ['label' => 'Confirmer la suppression'])
            ->getForm();
    }

   
    #[Route('/product-delete/{id}', name: 'product_delete', methods: ['GET', 'POST'])]
    public function delete(Request $request, EntityManagerInterface $manager, string $id): Response
    {
        $product = $manager->getRepository(Product::class)->find($id);
    
        if (null === $product) {
            throw $this->createNotFoundException('Le produit n\'a pas été trouvé.');
        }
    
        $form = $this->createDeleteConfirmationForm();
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $manager->remove($product);
            $manager->flush();
    
            $this->addFlash('success', 'Le produit a été supprimé avec succès.');
    
            return $this->redirectToRoute('app_home_supplier');
        }
    
        // Afficher la vue de confirmation si le formulaire n'a pas été soumis/validé
        return $this->render('supplier/product/delete.html.twig', [
            'product' => $product,
            'confirmationForm' => $form->createView(),
        ]);

}

#[Route('/commande/list', name: 'supplier_orders')]
public function order(OrderRepository $orderRepository, Security $security): Response
{

    $supplier = $security->getUser();

    // Assurez-vous que l'utilisateur est un fournisseur
    if (!$supplier || !($supplier instanceof Supplier)) {
        throw new \Exception("Accès refusé");
    }

    // Utilisez le repository pour trouver les produits liés au fournisseur connecté
    $orders = $orderRepository->findBySupplier($supplier);
    return $this->render('supplier/order/index.html.twig', [
        'controller_name' => 'UserController',
        'orders' => $orders
    ]);
}

#[Route('/commande/details/{id}', name: 'order_details')]
public function orderDetails(int $id, OrderRepository $orderRepository, OrderlineRepository $orderlineRepository, Security $security): Response
{
    $supplier = $security->getUser();
    
    // Assurez-vous que l'utilisateur est un fournisseur
    if (!$supplier || !($supplier instanceof Supplier)) {
        throw new \Exception("Accès refusé");
    }

    // Utilisez le repository pour trouver la commande par son ID
    $order = $orderRepository->findOneBy(['id' => $id, 'supplier' => $supplier]);

    // Si la commande n'existe pas ou ne correspond pas au fournisseur connecté
    if (!$order) {
        throw $this->createNotFoundException('La commande demandée n\'existe pas ou vous n\'avez pas le droit de la consulter.');
    }

    // Récupérez les lignes de commande associées à cette commande
    $orderlines = $orderlineRepository->findBy(['order' => $order]);

    return $this->render('supplier/order/details.html.twig', [
        'order' => $order,
        'orderlines' => $orderlines,
    ]);
}

#[Route(path: '/profil-edit/{id}', name: 'profil_edit')]
public function profilEdit(EntityManagerInterface $manager,ManagerRegistry $managerRegistry,Request $request, string $id): Response
{
    $supplier = $managerRegistry->getRepository(Supplier::class)->find($id);

    // Si le produit est null (donc non trouvé en BDD, alors on génère une 404).
    if (null === $supplier) {
        throw new NotFoundExceptionInterface();
    }

    $form = $this->createForm(SupplierType::class, $supplier);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
        
        $manager->flush();
        return $this->redirectToRoute('app_home_supplier');
    }

    return $this->render('supplier/user/index.html.twig', [
        'supplier' => $supplier,
        'formSupplier' => $form->createView(),
    ]);
}

}
