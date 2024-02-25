<?php

// src/DataFixtures/AdminFixtures.php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Admin;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class AdminFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $adminData = [
            [
                'email' => 'admin@example.com',
                'password' => 'adminpassword',
                'name' => 'Admin',
                'firstName' => 'Admin',
                'premium' => true,
            ],
            // Ajoutez d'autres administrateurs si nécessaire
        ];

        foreach ($adminData as $adminDatum) {
            $admin = new Admin();
            $admin->setEmail($adminDatum['email']);

            // Hachez le mot de passe avant de le définir
            $hashedPassword = $this->passwordHasher->hashPassword(
                $admin,
                $adminDatum['password']
            );
            $admin->setPassword($hashedPassword);

            $admin->setName($adminDatum['name']);
            $admin->setFirstName($adminDatum['firstName']);
            $admin->setPremium($adminDatum['premium']);

            $manager->persist($admin);
        }

        $manager->flush();
    }
}
