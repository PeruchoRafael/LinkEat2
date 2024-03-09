<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use App\Repository\ProductRepository;

class CartController extends AbstractController
{
    #[Route('/panier', name: 'cart_index')]
    public function index(SessionInterface $session, ProductRepository $productRepository): Response
    {
        $cart = $session->get('cart', []);
        $cartWithData = [];

        foreach ($cart as $item) {
            // Vérification de la structure attendue pour chaque élément du panier
            if (is_array($item) && isset($item['productId']) && isset($item['quantity'])) {
                $product = $productRepository->find($item['productId']);
                if ($product) {
                    $cartWithData[] = [
                        'product' => $product,
                        'quantity' => $item['quantity'],
                        'price' => $product->getPrice() // Supposons que votre entité Product a une méthode getPrice()
                    ];
                }
            }
        }

        return $this->render('cart/index.html.twig', [
            'items' => $cartWithData,
        ]);
    }

    #[Route('/add', name: 'add_to_cart')]
    public function addToCart(Request $request, SessionInterface $session): Response
    {
        $productId = $request->request->get('productId');
        $quantity = $request->request->get('quantity', 1); // La quantité par défaut est 1

        if (!$productId) {
            return $this->json(['status' => 'error', 'message' => 'Product ID is missing.']);
        }

        $cart = $session->get('cart', []);

        // Trouver l'indice du produit existant dans le panier
        $foundIndex = null;
        foreach ($cart as $index => $item) {
            if (is_array($item) && $item['productId'] == $productId) {
                $foundIndex = $index;
                break;
            }
        }

        if ($foundIndex !== null) {
            // Si le produit existe, mettez à jour la quantité
            $cart[$foundIndex]['quantity'] += $quantity;
        } else {
            // Si non, ajoutez un nouvel élément au panier
            $cart[] = ['productId' => $productId, 'quantity' => $quantity];
        }

        $session->set('cart', $cart);

        return $this->json(['status' => 'success', 'message' => 'Product added to cart successfully.']);
    }

    #[Route('/cart/remove/{id}', name: 'cart_remove')]
    public function remove(int $id, SessionInterface $session): Response
    {
        $cart = $session->get('cart', []);
        if (array_key_exists($id, $cart)) {
            unset($cart[$id]); // Supprime l'élément du tableau
            $session->set('cart', $cart); // Enregistre le nouveau panier en session
        }

        return $this->redirectToRoute('cart_index'); // Redirige vers l'affichage du panier
    }

}
