<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Orderline;
use App\Entity\Product;
use App\Entity\Order;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OrderlineFixtures extends Fixture implements DependentFixtureInterface 
{
    public function load(ObjectManager $manager): void
    {
        $orderlines = [
            [
                'quantity' => 2,
                'order' => 'order_0', // Reference à une commande spécifique
                'product' => 'Fruit de la Passion', // Nom du produit
            ],
            [
                'quantity' => 3,
                'order' => 'order_0', // Reference à la même commande que ci-dessus
                'product' => 'Sole', // Nom du produit
            ],
            [
                'quantity' => 1,
                'order' => 'order_1', // Reference à une autre commande
                'product' => 'Côtelettes d\'agneau', // Nom du produit
            ],
        ];

        foreach ($orderlines as $orderlineData) {
            $orderline = new Orderline();
            $orderline->setQuantity($orderlineData['quantity']);

            // Récupérer la référence de la commande
            $orderReference = $this->getReference($orderlineData['order']);
            $orderline->setOrder($orderReference);

            // Récupérer la référence du produit
            $productReference = $this->getReference($orderlineData['product']);
            $orderline->setProduct($productReference);

            $manager->persist($orderline);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            ProductFixtures::class, 
            OrderFixtures::class,
        ];
    }
}
