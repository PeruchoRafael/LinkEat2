<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Supplier;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class SupplierFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager): void
    {
    $suppliers= [
        [
            'category' => 'Viande',
            'companyName' => 'Boucherie Dupont',
            'siretNumber' => '12345678901234',
            'postalAddress' => '75001',
            'country' => 'France',
            'city' => 'Paris',
            'address' => '123 Avenue de la Boucherie',
            'location' => 'Paris',
            'email' => 'contact@boucheriedupont.fr',
            'password' => 'Boucherie2024!',
            'name' => 'Jean',
            'firstName' => 'Dupont',
            'premium' => true,
        ],
        [
            'category' => 'Poisson',
            'companyName' => 'Poissonnerie Maree',
            'siretNumber' => '98765432109876',
            'postalAddress' => '13008',
            'country' => 'France',
            'city' => 'Marseille',
            'address' => '25 Rue de la Mer',
            'location' => 'Marseille',
            'email' => 'info@maree.fr',
            'password' => 'Poissons2024!',
            'name' => 'Marie',
            'firstName' => 'Lepoisson',
            'premium' => false,
        ],

        [
            'category' => 'Légumes',
            'companyName' => 'Les Jardins de Léo',
            'siretNumber' => '23456789012345',
            'postalAddress' => '34000',
            'country' => 'France',
            'city' => 'Montpellier',
            'address' => '78 Rue des Jardins',
            'location' => 'Montpellier',
            'email' => 'contact@jardinsleo.fr',
            'password' => 'Legumes2024!',
            'name' => 'Léo',
            'firstName' => 'Martin',
            'premium' => false,
        ],
        [
            'category' => 'Fruits',
            'companyName' => 'Fruitière Express',
            'siretNumber' => '34567890123456',
            'postalAddress' => '33000',
            'country' => 'France',
            'city' => 'Bordeaux',
            'address' => '2 Avenue des Fruits',
            'location' => 'Bordeaux',
            'email' => 'service@fruitiereexpress.fr',
            'password' => 'Fruits2024!',
            'name' => 'Clara',
            'firstName' => 'Dupuis',
            'premium' => true,
        ],
        [
            'category' => 'Noix',
            'companyName' => 'Noix du Périgord',
            'siretNumber' => '45678901234567',
            'postalAddress' => '24000',
            'country' => 'France',
            'city' => 'Périgueux',
            'address' => '11 Rue des Noisetiers',
            'location' => 'Périgueux',
            'email' => 'contact@noixperigord.fr',
            'password' => 'Noix2024!',
            'name' => 'Bernard',
            'firstName' => 'Leroy',
            'premium' => false,
        ],
        [
            'category' => 'Produits laitiers',
            'companyName' => 'Laiterie Saint-Pierre',
            'siretNumber' => '56789012345678',
            'postalAddress' => '35000',
            'country' => 'France',
            'city' => 'Rennes',
            'address' => '33 Rue de la Laiterie',
            'location' => 'Rennes',
            'email' => 'info@laiteriestpierre.fr',
            'password' => 'Lait2024!',
            'name' => 'Sophie',
            'firstName' => 'Moreau',
            'premium' => true,
        ],
        
        [
            'category' => 'Boulangerie et pâtisserie',
            'companyName' => 'Délices de Sophie',
            'siretNumber' => '67890123456789',
            'postalAddress' => '59000',
            'country' => 'France',
            'city' => 'Lille',
            'address' => '48 Rue des Boulangeries',
            'location' => 'Lille',
            'email' => 'delices@sophie.fr',
            'password' => 'Delices2024!',
            'name' => 'Sophie',
            'firstName' => 'Durand',
            'premium' => false,
        ],

        
        [
            'category' => 'Boissons',
            'companyName' => 'Brasserie du Nord',
            'siretNumber' => '78901234567890',
            'postalAddress' => '80000',
            'country' => 'France',
            'city' => 'Amiens',
            'address' => '15 Rue de la Soif',
            'location' => 'Amiens',
            'email' => 'contact@brasseriedunord.fr',
            'password' => 'Biere2024!',
            'name' => 'Pierre',
            'firstName' => 'Girard',
            'premium' => true,
        ],
        
        [
            'category' => 'Viande',
            'companyName' => 'Boucherie Centrale',
            'siretNumber' => '89012345678901',
            'postalAddress' => '13000',
            'country' => 'France',
            'city' => 'Marseille',
            'address' => '22 Avenue du Prado',
            'location' => 'Marseille',
            'email' => 'service@boucheriecentrale.fr',
            'password' => 'Viande2024!',
            'name' => 'Étienne',
            'firstName' => 'Blanc',
            'premium' => false,
        ],
        
        [
            'category' => 'Poisson',
            'companyName' => 'Poissonnerie de la Mer',
            'siretNumber' => '90123456789012',
            'postalAddress' => '17000',
            'country' => 'France',
            'city' => 'La Rochelle',
            'address' => '5 Quai Duperré',
            'location' => 'La Rochelle',
            'email' => 'contact@poissonneriedelamer.fr',
            'password' => 'Poisson2024!',
            'name' => 'Marc',
            'firstName' => 'Lebrun',
            'premium' => true,
        ],
        
        [
            'category' => 'Légumes',
            'companyName' => 'Verdura Bio',
            'siretNumber' => '01234567890123',
            'postalAddress' => '34070',
            'country' => 'France',
            'city' => 'Montpellier',
            'address' => '100 Rue des Oliviers',
            'location' => 'Montpellier',
            'email' => 'info@verdurabio.fr',
            'password' => 'Bio2024!',
            'name' => 'Julien',
            'firstName' => 'Faure',
            'premium' => false,
        ],
        
        [
            'category' => 'Fruits',
            'companyName' => 'Orchidées Fruitées',
            'siretNumber' => '12345678901234',
            'postalAddress' => '33000',
            'country' => 'France',
            'city' => 'Bordeaux',
            'address' => '88 Rue des Fruits',
            'location' => 'Bordeaux',
            'email' => 'service@orchideesfruitees.fr',
            'password' => 'Orchidee2024!',
            'name' => 'Émilie',
            'firstName' => 'Petit',
            'premium' => true,
        ],
        
        [
            'category' => 'Noix',
            'companyName' => 'Noix & Co',
            'siretNumber' => '23456789012345',
            'postalAddress' => '24000',
            'country' => 'France',
            'city' => 'Périgueux',
            'address' => '43 Rue des Noyers',
            'location' => 'Périgueux',
            'email' => 'contact@noixco.fr',
            'password' => 'NoixEtCo2024!',
            'name' => 'Aurélie',
            'firstName' => 'Lemaire',
            'premium' => false,
        ],
        
        [
            'category' => 'Produits laitiers',
            'companyName' => 'Fromagerie du Soleil',
            'siretNumber' => '34567890123456',
            'postalAddress' => '84000',
            'country' => 'France',
            'city' => 'Avignon',
            'address' => '18 Rue des Fromages',
            'location' => 'Avignon',
            'email' => 'info@fromageriedusoleil.fr',
            'password' => 'Fromage2024!',
            'name' => 'Charlotte',
            'firstName' => 'Mercier',
            'premium' => true,
        ],
        
        [
            'category' => 'Boulangerie et pâtisserie',
            'companyName' => 'Les Délices du Boulanger',
            'siretNumber' => '45678901234567',
            'postalAddress' => '75004',
            'country' => 'France',
            'city' => 'Paris',
            'address' => '5 Rue de la Boulangerie',
            'location' => 'Paris',
            'email' => 'contact@lesdelicesduboulanger.fr',
            'password' => 'Boulanger2024!',
            'name' => 'Thomas',
            'firstName' => 'Richard',
            'premium' => false,
        ],

    ];







        foreach ($suppliers as $supplierData) {
            $supplier = new Supplier();
            $supplier->setCompanyName($supplierData['companyName']);
            $supplier->setSiretNumber($supplierData['siretNumber']);
            $supplier->setPostalAddress($supplierData['postalAddress']);
            $supplier->setCountry($supplierData['country']);
            $supplier->setCity($supplierData['city']);
            $supplier->setAddress($supplierData['address']);
            $supplier->setDescription($supplierData['location']);
            $supplier->setEmail($supplierData['email']);
            $supplier->setPassword($supplierData['password']);
            $supplier->setName($supplierData['name']);
            $supplier->setFirstName($supplierData['firstName']);
            $supplier->setPremium($supplierData['premium']);
            

            $manager->persist($supplier);

            $this->addReference($supplierData['companyName'], $supplier);
        }
        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class, 
        ];
    }
}
