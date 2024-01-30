<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Product;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use App\Entity\Supplier;


class ProductFixtures extends Fixture implements DependentFixtureInterface 
{
    public function load(ObjectManager $manager): void
    {
        $products= [

            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Steak de bœuf',
                'description' => 'Un steak de bœuf tendre et juteux.',
                'price' => 15.99,
                'quantity' => 50,
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Côtelettes d\'agneau',
                'description' => 'Côtelettes d\'agneau marinées aux herbes.',
                'price' => 18.50,
                'quantity' => 30,
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Centrale',
                'name' => 'Poulet rôti',
                'description' => 'Poulet entier prêt à cuire, mariné aux épices.',
                'price' => 12.00,
                'quantity' => 40,
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Centrale',
                'name' => 'Saucisses de Toulouse',
                'description' => 'Saucisses fraîches idéales pour le barbecue.',
                'price' => 7.99,
                'quantity' => 60,
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Centrale',
                'name' => 'Jambon de Bayonne',
                'description' => 'Jambon sec affiné, tranché finement.',
                'price' => 5.49,
                'quantity' => 70,
            ],

            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Rosbif',
                'description' => 'Rosbif de qualité supérieure, parfait pour les repas de famille.',
                'price' => 18.50,
                'quantity' => 30
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Filet Mignon',
                'description' => 'Filet Mignon tendre et juteux, idéal pour une occasion spéciale.',
                'price' => 25.00,
                'quantity' => 20
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Saucisson Sec',
                'description' => 'Saucisson sec artisanal, parfait pour l\'apéritif.',
                'price' => 5.99,
                'quantity' => 50
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Rillettes de Porc',
                'description' => 'Rillettes de porc, riche en saveurs, idéal pour vos pique-niques.',
                'price' => 4.50,
                'quantity' => 40
            ],
            [
                'category' => 'Viande',
                'companyName' => 'Boucherie Dupont',
                'name' => 'Terrine de Campagne',
                'description' => 'Terrine de campagne traditionnelle, un classique toujours apprécié.',
                'price' => 6.20,
                'quantity' => 35
            ],

            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Les Délices du Boulanger',
                'name' => 'Baguette tradition',
                'description' => 'Une baguette croustillante et moelleuse, faite avec des ingrédients de qualité.',
                'price' => 1.10,
                'quantity' => 100
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Les Délices du Boulanger',
                'name' => 'Croissant au beurre',
                'description' => 'Croissant feuilleté et riche en beurre, parfait pour le petit déjeuner.',
                'price' => 0.95,
                'quantity' => 80
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Les Délices du Boulanger',
                'name' => 'Éclair au chocolat',
                'description' => 'Pâtisserie française classique avec une crème pâtissière au chocolat et un glaçage riche.',
                'price' => 2.50,
                'quantity' => 40
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Les Délices du Boulanger',
                'name' => 'Tarte aux pommes',
                'description' => 'Tarte traditionnelle aux pommes, avec une pâte croustillante et des pommes juteuses.',
                'price' => 12.00,
                'quantity' => 30
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Les Délices du Boulanger',
                'name' => 'Pain au chocolat',
                'description' => 'Viennoiserie avec de délicieux morceaux de chocolat, idéale pour une pause gourmande.',
                'price' => 1.20,
                'quantity' => 70
            ],

            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Délices de Sophie',
                'name' => 'Flûte de campagne',
                'description' => 'Pain rustique à la croûte épaisse et à la mie aérée, idéal pour accompagner les repas.',
                'price' => 1.80,
                'quantity' => 50
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Délices de Sophie',
                'name' => 'Macaron vanille',
                'description' => 'Macaron délicat à la vanille, avec une texture croquante à l’extérieur et moelleuse à l’intérieur.',
                'price' => 0.90,
                'quantity' => 120
            ],
            [
                'category' => 'Boulangerie et pâtisserie',
                'companyName' => 'Délices de Sophie',
                'name' => 'Tarte au citron meringuée',
                'description' => 'Tarte au citron avec une meringue légère et aérienne, une douceur acidulée.',
                'price' => 14.00,
                'quantity' => 25
            ],

            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie Maree',
                'name' => 'Saumon frais',
                'description' => 'Saumon frais de l’Atlantique, parfait pour des grillades ou un plat vapeur.',
                'price' => 18.50,
                'quantity' => 40
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie Maree',
                'name' => 'Bar entier',
                'description' => 'Bar de ligne, pêché durablement, idéal pour une cuisson au four ou en papillote.',
                'price' => 22.00,
                'quantity' => 30
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie Maree',
                'name' => 'Crevettes roses',
                'description' => 'Crevettes roses juteuses, parfaites pour un apéritif ou une entrée.',
                'price' => 15.00,
                'quantity' => 50,
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie Maree',
                'name' => 'Filet de dorade',
                'description' => 'Filet de dorade délicat, idéal pour une cuisson rapide à la poêle.',
                'price' => 19.75,
                'quantity' => 35,
            ],

            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie de la Mer',
                'name' => 'Thon rouge',
                'description' => 'Thon rouge de première qualité, parfait pour des sushis ou des steaks.',
                'price' => 25.00,
                'quantity' => 20
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie de la Mer',
                'name' => 'Moules fraîches',
                'description' => 'Moules fraîches, idéales pour préparer une marinière ou une sauce à l\'ail.',
                'price' => 6.50,
                'quantity' => 100
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie de la Mer',
                'name' => 'Calamars',
                'description' => 'Calamars tendres, parfaits pour une friture ou une paella.',
                'price' => 12.00,
                'quantity' => 45
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie de la Mer',
                'name' => 'Sole',
                'description' => 'Sole fraîche, un poisson fin et délicat, idéal à la poêle.',
                'price' => 18.00,
                'quantity' => 30
            ],
            [
                'category' => 'Poisson',
                'companyName' => 'Poissonnerie de la Mer',
                'name' => 'Huîtres',
                'description' => 'Huîtres de qualité supérieure, excellentes pour des dégustations fraîches.',
                'price' => 20.00,
                'quantity' => 50
            ],

            [
                'category' => 'Légumes',
                'companyName' => 'Les Jardins de Léo',
                'name' => 'Tomates cerises',
                'description' => 'Petites et juteuses, idéales pour des salades ou des apéritifs.',
                'price' => 2.50,
                'quantity' => 100
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Les Jardins de Léo',
                'name' => 'Carottes bio',
                'description' => 'Carottes bio croquantes, parfaites pour les jus ou les plats cuisinés.',
                'price' => 1.80,
                'quantity' => 80
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Les Jardins de Léo',
                'name' => 'Courgettes',
                'description' => 'Courgettes fraîches et tendres, idéales pour griller ou faire des ratatouilles.',
                'price' => 1.50,
                'quantity' => 60
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Les Jardins de Léo',
                'name' => 'Salade verte',
                'description' => 'Salade verte croquante, essentielle pour toutes sortes de salades.',
                'price' => 1.00,
                'quantity' => 100
            ],

            [
                'category' => 'Légumes',
                'companyName' => 'Verdura Bio',
                'name' => 'Épinards bio',
                'description' => 'Épinards frais et biologiques, parfaits pour des plats sains et nutritifs.',
                'price' => 2.00,
                'quantity' => 50
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Verdura Bio',
                'name' => 'Poivrons rouges bio',
                'description' => 'Poivrons rouges biologiques, idéals pour ajouter de la couleur et de la saveur à vos plats.',
                'price' => 3.00,
                'quantity' => 40
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Verdura Bio',
                'name' => 'Aubergines bio',
                'description' => 'Aubergines biologiques, excellentes pour des recettes méditerranéennes.',
                'price' => 2.50,
                'quantity' => 30
            ],
            [
                'category' => 'Légumes',
                'companyName' => 'Verdura Bio',
                'name' => 'Pommes de terre bio',
                'description' => 'Pommes de terre biologiques polyvalentes, parfaites pour une variété de plats.',
                'price' => 1.75,
                'quantity' => 100
            ],

            [
                'category' => 'Fruits',
                'companyName' => 'Fruitière Express',
                'name' => 'Pommes Gala',
                'description' => 'Pommes Gala croquantes et juteuses, idéales pour une collation saine.',
                'price' => 2.50,
                'quantity' => 60
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Fruitière Express',
                'name' => 'Bananes',
                'description' => 'Bananes mûres et riches en potassium, parfaites pour un boost d’énergie.',
                'price' => 1.80,
                'quantity' => 100
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Fruitière Express',
                'name' => 'Oranges Valencia',
                'description' => 'Oranges Valencia juteuses, idéales pour un jus frais ou comme en-cas.',
                'price' => 3.00,
                'quantity' => 80
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Fruitière Express',
                'name' => 'Fraises',
                'description' => 'Fraises fraîches et sucrées, parfaites pour des desserts ou à déguster seules.',
                'price' => 3.50,
                'quantity' => 40
            ],

            [
                'category' => 'Fruits',
                'companyName' => 'Orchidées Fruitées',
                'name' => 'Mangues',
                'description' => 'Mangues juteuses et sucrées, parfaites pour une touche tropicale.',
                'price' => 4.00,
                'quantity' => 50
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Orchidées Fruitées',
                'name' => 'Kiwi Vert',
                'description' => 'Kiwi vert riche en vitamine C, idéal pour un en-cas sain.',
                'price' => 2.20,
                'quantity' => 75
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Orchidées Fruitées',
                'name' => 'Papayes',
                'description' => 'Papayes mûres, un choix excellent pour un dessert naturellement sucré.',
                'price' => 3.50,
                'quantity' => 40
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Orchidées Fruitées',
                'name' => 'Ananas',
                'description' => 'Ananas frais, idéal pour un jus tropical ou pour agrémenter vos plats.',
                'price' => 3.00,
                'quantity' => 60
            ],
            [
                'category' => 'Fruits',
                'companyName' => 'Orchidées Fruitées',
                'name' => 'Fruit de la Passion',
                'description' => 'Fruit de la passion acidulé, parfait pour une explosion de saveurs exotiques.',
                'price' => 5.00,
                'quantity' => 30
            ],

            [
                'category' => 'Boissons',
                'companyName' => 'Brasserie du Nord',
                'name' => 'Bière Blonde Artisanale',
                'description' => 'Une bière blonde légère et rafraîchissante, parfaite pour les fins de journée ensoleillées.',
                'price' => 2.50,
                'quantity' => 120
            ],
            [
                'category' => 'Boissons',
                'companyName' => 'Brasserie du Nord',
                'name' => 'Bière Ambrée',
                'description' => 'Bière ambrée avec des notes de caramel et de malt, idéale pour accompagner vos repas.',
                'price' => 2.80,
                'quantity' => 100
            ],
            [
                'category' => 'Boissons',
                'companyName' => 'Brasserie du Nord',
                'name' => 'Bière IPA',
                'description' => 'Une IPA aromatique et houblonnée, offrant une explosion de saveurs pour les amateurs de bières fortes.',
                'price' => 3.00,
                'quantity' => 80
            ],

            [
                'category' => 'Produits laitiers',
                'companyName' => 'Laiterie Saint-Pierre',
                'name' => 'Fromage Brie',
                'description' => 'Un fromage brie crémeux et onctueux, parfait pour vos plateaux de fromages.',
                'price' => 3.50,
                'quantity' => 60
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Laiterie Saint-Pierre',
                'name' => 'Lait Entier',
                'description' => 'Lait entier frais et naturel, idéal pour vos céréales matinales ou recettes de cuisine.',
                'price' => 1.20,
                'quantity' => 150
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Laiterie Saint-Pierre',
                'name' => 'Yaourt Nature',
                'description' => 'Yaourt nature onctueux, sans sucre ajouté, parfait pour un snack sain.',
                'price' => 0.80,
                'quantity' => 100
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Laiterie Saint-Pierre',
                'name' => 'Beurre de Baratte',
                'description' => 'Beurre de baratte artisanal, riche en goût, idéal pour la pâtisserie et la cuisine.',
                'price' => 2.30,
                'quantity' => 80
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Laiterie Saint-Pierre',
                'name' => 'Crème Fraîche',
                'description' => 'Crème fraîche épaisse et onctueuse, parfaite pour vos sauces et desserts.',
                'price' => 1.50,
                'quantity' => 70
            ],

            [
                'category' => 'Produits laitiers',
                'companyName' => 'Fromagerie du Soleil',
                'name' => 'Camembert Artisanal',
                'description' => 'Un camembert riche et fondant, fabriqué artisanalement pour une saveur authentique.',
                'price' => 4.00,
                'quantity' => 50
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Fromagerie du Soleil',
                'name' => 'Raclette Nature',
                'description' => 'Fromage à raclette traditionnel, parfait pour un repas convivial en famille ou entre amis.',
                'price' => 5.50,
                'quantity' => 40
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Fromagerie du Soleil',
                'name' => 'Fromage de Chèvre Frais',
                'description' => 'Fromage de chèvre frais et léger, avec une texture douce et une saveur délicate.',
                'price' => 3.20,
                'quantity' => 70
            ],
            [
                'category' => 'Produits laitiers',
                'companyName' => 'Fromagerie du Soleil',
                'name' => 'Mozzarella di Bufala',
                'description' => 'Mozzarella di bufala authentique, idéale pour vos pizzas, salades et antipasti.',
                'price' => 2.80,
                'quantity' => 85
            ],

            [
                'category' => 'Noix',
                'companyName' => 'Noix du Périgord',
                'name' => 'Cerneaux de Noix',
                'description' => 'Cerneaux de noix frais et croquants, parfaits pour une collation ou pour agrémenter vos plats.',
                'price' => 3.50,
                'quantity' => 100
            ],
            [
                'category' => 'Noix',
                'companyName' => 'Noix du Périgord',
                'name' => 'Noix en Coque',
                'description' => 'Noix du Périgord en coque, à déguster nature ou à utiliser dans vos recettes préférées.',
                'price' => 2.80,
                'quantity' => 120
            ],
            [
                'category' => 'Noix',
                'companyName' => 'Noix du Périgord',
                'name' => 'Huile de Noix',
                'description' => 'Huile de noix pressée à froid, idéale pour assaisonner les salades et enrichir vos plats.',
                'price' => 6.00,
                'quantity' => 75
            ],

                [
                    'category' => 'Noix',
                    'companyName' => 'Noix & Co',
                    'name' => 'Amandes Grillées',
                    'description' => 'Amandes soigneusement grillées pour un goût riche et une texture croquante.',
                    'price' => 4.00,
                    'quantity' => 80
                ],
                [
                    'category' => 'Noix',
                    'companyName' => 'Noix & Co',
                    'name' => 'Mélange de Noix',
                    'description' => 'Un assortiment savoureux de noix variées, incluant noisettes, amandes, et noix de cajou.',
                    'price' => 5.50,
                    'quantity' => 100
                ],
                [
                    'category' => 'Noix',
                    'companyName' => 'Noix & Co',
                    'name' => 'Pistaches Salées',
                    'description' => 'Pistaches soigneusement salées, idéales pour l\'apéritif ou comme en-cas.',
                    'price' => 3.75,
                    'quantity' => 90
                ],
                [
                    'category' => 'Noix',
                    'companyName' => 'Noix & Co',
                    'name' => 'Noix de Macadamia',
                    'description' => 'Des noix de Macadamia de première qualité, riches en saveurs et en nutriments.',
                    'price' => 6.50,
                    'quantity' => 70
                ],
                [
                    'category' => 'Noix',
                    'companyName' => 'Noix & Co',
                    'name' => 'Cacahuètes enrobées de chocolat',
                    'description' => 'Des cacahuètes croquantes enrobées d’un riche chocolat, un délice sucré-salé.',
                    'price' => 4.20,
                    'quantity' => 85
                ]
            
            



            
        ];


            
            
            
            





        
        

        foreach ($products as $productData) {
            $product = new Product();
            $product->setName($productData['name']);
            $product->setDescription($productData['description']);
            $product->setPrice($productData['price']);
            $product->setQuantity($productData['quantity']);
            
            $categoryReference = $this->getReference($productData['category']);
            $product->setCategory($categoryReference);
        
            $supplierReference = $this->getReference($productData['companyName']);
            $product->setSupplier($supplierReference);
        
            $manager->persist($product);
        
            $this->addReference($productData['name'], $product);
        }

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CategoryFixtures::class, 
            SupplierFixtures::class,
        ];
    }
}

        