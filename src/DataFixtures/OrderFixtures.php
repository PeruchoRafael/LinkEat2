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
                'supplier' =>'Orchidée Fruitées',
            ],
            [
                'orderDate' => new \DateTimeImmutable('now'),
                'supplier' => 'Brasserie du Nord',
                'email' => 'bruno.caen@outlook.com',
                
            ],
            [
                'orderDate' => new \DateTimeImmutable('now'),
                'supplier' => 'Poissonnerie Maree',
                'email' => 'clara.montpellier@outlook.com',
            ],
        ];

        foreach ($orders as $orderData) {
            $order = new Order();
            $order->setOrderDate($orderData['orderDate']);

            $restaurateurReference = $this->getReference($orderData['email']);
            $order->setRestaurateur($restaurateurReference);

            $supplierReference = $this->getReference($orderData['email']);            
            $order->setSupplier($supplierReference['supplier']);

            $manager->persist($order);
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
