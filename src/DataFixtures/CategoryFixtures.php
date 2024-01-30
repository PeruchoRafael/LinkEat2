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
            // Catégories de fournisseurs
            ['name' => 'Viande', 'image' => 'viande.jpg'],
            ['name' => 'Poisson', 'image' => 'poisson.jpg'],
            ['name' => 'Légumes', 'image' => 'legumes.jpg'],
            ['name' => 'Fruits', 'image' => 'fruits.jpg'],
            ['name' => 'Noix', 'image' => 'noix.jpg'],
            ['name' => 'Produits laitiers', 'image' => 'produits_laitiers.jpg'],
            ['name' => 'Boulangerie et pâtisserie', 'image' => 'boulangerie.jpg'],
            ['name' => 'Boissons', 'image' => 'boissons.jpg'],
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
