<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Category;


class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $categories = [
        
        ['name' => 'Poisson',
        'image' => 'poisson.jpg'
        ],

        ['name' => 'Viande',
        'image' => 'viande.jpg'
        ],

        ['name' => 'Fruits',
        'image' => 'fruit.jpg'
        ],

        ['name' => 'Légumes',
        'image' => 'légume.jpg'
        ],

        ];

        foreach ($categories as $categoryData) {
            $category = new Category();
            $category->setName($categoryData['name']);
            $category->setImage($categoryData['image']);
            $manager->persist($category);

            $this->addReference($categoryData['name'], $category);
        }

        

        $manager->flush();
    }
}
