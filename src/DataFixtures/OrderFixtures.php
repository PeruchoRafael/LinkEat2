<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Order;
use App\Entity\Supplier;
use App\Entity\Restaurateur;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class OrderFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
        $orders = [
            [
                'orderDate' => new \DateTimeImmutable('now'),
                'email' => 'amandine.toulouse@gmail.com',
                'supplier' => 'Orchidées Fruitées',
                'status' => 'NEW',
            ],
            [
                'orderDate' => new \DateTimeImmutable('now'),
                'email' => 'clara.montpellier@outlook.com',
                'supplier' => 'Poissonnerie Maree',
                'status' => 'NEW',
            ],
            [
                'orderDate' => new \DateTimeImmutable('now'),
                'email' => 'bruno.caen@outlook.com',
                'supplier' => 'Boucherie Dupont',
                'status' => 'NEW',
            ],
        ];

        foreach ($orders as $key => $orderData) {
            $order = new Order();
            $order->setOrderDate($orderData['orderDate']);
            $order->setStatus($orderData['status']);

            // Récupérer la référence du restaurateur en utilisant l'email
            $restaurateurReference = $this->getReference($orderData['email']);
            $order->setRestaurateur($restaurateurReference);

            // Récupérer la référence du fournisseur en utilisant le nom de l'entreprise
            $supplierReference = $this->getReference($orderData['supplier']);
            $order->setSupplier($supplierReference);

            $manager->persist($order);

            // Ajouter une référence à chaque commande créée
            $this->addReference('order_' . $key, $order);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            SupplierFixtures::class, 
            RestaurateurFixtures::class,
        ];
    }
}
