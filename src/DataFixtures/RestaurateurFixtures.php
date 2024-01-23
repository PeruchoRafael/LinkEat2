<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Restaurateur;

class RestaurateurFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $restaurateurs=[

        ['phone' => 0606060606,
         'location'=>'Paris',
         'email' => 'jeanneymar@gmail.com',
         'password' => 'jeanney123',
         'name' => 'Jean',
         'firstName' => 'Neymar',
         'premium' => true,
        ],

        ['phone' => 0707070707,
         'location'=>'Paris',
         'email' => 'thibob@gmail.com',
         'password' => 'thithilebandit91',
         'name' => 'Thibaut',
         'firstName' => 'Bob',
         'premium' => false,
        ],

        ];




        foreach ($restaurateurs as $restauData) {
            $restaurateur = new Restaurateur();
            $restaurateur->setPhone($restauData['phone']);
            $restaurateur->setLocation($restauData['location']);
            $restaurateur->setEmail($restauData['email']);
            $restaurateur->setPassword($restauData['password']);
            $restaurateur->setName($restauData['name']);
            $restaurateur->setFirstName($restauData['firstName']);
            $restaurateur->setPremium($restauData['premium']);

            $manager->persist($restaurateur);

            $this->addReference($restauData['name'], $restaurateur);
        }
    }
}
