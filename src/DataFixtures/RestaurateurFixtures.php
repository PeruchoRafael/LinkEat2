<?php


namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Restaurateur;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class RestaurateurFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $restaurateurs = [
            [
                'phone' => '0678543210',
                'location' => 'Rennes',
                'email' => 'camille.rennes@gmail.com',
                'password' => 'camillepassword',
                'name' => 'Camille',
                'firstName' => 'Brunet',
                'premium' => true,
            ],
            [
                'phone' => '0698123456',
                'location' => 'Reims',
                'email' => 'antoine.reims@gmail.com',
                'password' => 'antoinepassword',
                'name' => 'Antoine',
                'firstName' => 'Blanc',
                'premium' => false,
            ],
            [
                'phone' => '0687654321',
                'location' => 'Saint-Étienne',
                'email' => 'marie.stetienne@gmail.com',
                'password' => 'mariepassword',
                'name' => 'Marie',
                'firstName' => 'Guerin',
                'premium' => true,
            ],
            [
                'phone' => '0654987654',
                'location' => 'Toulon',
                'email' => 'alex.toulon@gmail.com',
                'password' => 'alexpassword',
                'name' => 'Alex',
                'firstName' => 'Leroy',
                'premium' => false,
            ],

            [
                'phone' => '0645123987',
                'location' => 'Nantes',
                'email' => 'louis.nantes@gmail.com',
                'password' => 'NantesPass2024',
                'name' => 'Louis',
                'firstName' => 'Dupont',
                'premium' => true,
            ],
            [
                'phone' => '0765983421',
                'location' => 'Strasbourg',
                'email' => 'sophie.stras@outlook.com',
                'password' => 'SophieStras123',
                'name' => 'Sophie',
                'firstName' => 'Moreau',
                'premium' => false,
            ],
            [
                'phone' => '0698745612',
                'location' => 'Bordeaux',
                'email' => 'pierre.bordeaux@outlook.com',
                'password' => 'PierreBdx2024',
                'name' => 'Pierre',
                'firstName' => 'Lefebvre',
                'premium' => true,
            ],
            [
                'phone' => '0687945613',
                'location' => 'Lille',
                'email' => 'julie.lille@outlook.com',
                'password' => 'JulieLille2024',
                'name' => 'Julie',
                'firstName' => 'Fournier',
                'premium' => false,
            ],

            [
                'phone' => '0678123456',
                'location' => 'Montpellier',
                'email' => 'clara.montpellier@outlook.com',
                'password' => 'ClaraMontp2024',
                'name' => 'Clara',
                'firstName' => 'Bertrand',
                'premium' => false,
            ],
            [
                'phone' => '0654321876',
                'location' => 'Grenoble',
                'email' => 'remy.grenoble@outlook.com',
                'password' => 'RemyGrenoble2024',
                'name' => 'Remy',
                'firstName' => 'Petit',
                'premium' => true,
            ],
            [
                'phone' => '0645872310',
                'location' => 'Dijon',
                'email' => 'nathalie.dijon@outlook.com',
                'password' => 'NathDijon2024',
                'name' => 'Nathalie',
                'firstName' => 'Roux',
                'premium' => false,
            ],
            [
                'phone' => '0632145897',
                'location' => 'Angers',
                'email' => 'frederic.angers@outlook.com',
                'password' => 'FredAngers2024',
                'name' => 'Frederic',
                'firstName' => 'Richard',
                'premium' => true,
            ],
            [
                'phone' => '0687654982',
                'location' => 'Clermont-Ferrand',
                'email' => 'isabelle.clermont@outlook.com',
                'password' => 'IsaClermont2024',
                'name' => 'Isabelle',
                'firstName' => 'Brun',
                'premium' => false,
            ],
            [
                'phone' => '0665432178',
                'location' => 'Caen',
                'email' => 'bruno.caen@outlook.com',
                'password' => 'BrunoCaen2024',
                'name' => 'Bruno',
                'firstName' => 'Blanchard',
                'premium' => true,
            ],
            [
                'phone' => '0678912345',
                'location' => 'Toulouse',
                'email' => 'amandine.toulouse@gmail.com',
                'password' => 'AmandineTlse2024',
                'name' => 'Amandine',
                'firstName' => 'Lemoine',
                'premium' => false,
            ],
        ];

        foreach ($restaurateurs as $restauData) {
            $restaurateur = new Restaurateur();
            $restaurateur->setPhone($restauData['phone']);
            $restaurateur->setLocation($restauData['location']);
            $restaurateur->setEmail($restauData['email']);

            // Hacher le mot de passe avant de le définir
            $hashedPassword = $this->passwordHasher->hashPassword(
                $restaurateur,
                $restauData['password']
            );
            $restaurateur->setPassword($hashedPassword);

            $restaurateur->setName($restauData['name']);
            $restaurateur->setFirstName($restauData['firstName']);
            $restaurateur->setPremium($restauData['premium']);

            $manager->persist($restaurateur);
            $this->addReference($restauData['email'], $restaurateur);
        }

        $manager->flush();
    }
}

