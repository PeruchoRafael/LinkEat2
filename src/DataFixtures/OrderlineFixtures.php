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
                'order' => 1, 
                'product' => 'Fruits de la Passion', 
            ],
            [
                'quantity' => 3,
                'order' => 1,
                'product' => 'Sole',
            ],
            [
                'quantity' => 1,
                'orderId' => 1,
                'product' => 'Côtelette d\'agneau',
            ],
            [
                'quantity' => 4,
                'order' => 1,
                'product' => 'Pain au chocolat',
            ],
            [
                'quantity' => 10,
                'order' => 1,
                'product' => 'Tomates cerises',
            ],
    
            [
                'quantity' => 5,
                'order' => 2, 
                'product' => 'Mozzarella di Bufala', 
            ],
            [
                'quantity' => 25,
                'order' => 2,
                'product' => 'Tomates Cerises',
            ],
            [
                'quantity' => 12,
                'orderId' => 2,
                'product' => 'Cerneaux de Noix',
            ],
            [
                'quantity' => 4,
                'order' => 2,
                'product' => 'Bière ambrée',
            ],
            [
                'quantity' => 10,
                'order' => 2,
                'product' => 'Carottes bio',
            ],
    
            [
                'quantity' => 5,
                'orderId' => 3,
                'product' => 'Cerneau de Noix',
            ],
            [
                'quantity' => 5,
                'order' => 3,
                'product' => 'Saumon frais',
            ],
            [
                'quantity' => 3,
                'order' => 3,
                'product' => 'Poulet rôti',
            ],
        ];
        

        foreach ($orderlines as $orderlineData) {
            $orderline = new Orderline();
            $orderline->setQuantity($orderlineData['quantity']);
        
            $orderReference = $this->getReference($orderlineData['order']);
            $orderline->setOrder($orderReference);
        
            $productReference = $this->getReference($orderlineData['companyName']);
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
