<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Restaurateur;

class RestaurateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {

        $restaurateur = new Restaurateur();
        
        $manager->persist($restaurateur);
        $manager->flush();
       /* $restaurateurs = [
        ['name' => 'Jean'
        'location'
        
        ],
        ];

        $manager->flush();
    }
    */
    }
}
