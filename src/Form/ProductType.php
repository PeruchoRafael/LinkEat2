<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Product;
// Use statements for the form types you're going to use
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name') // Assumé être un champ texte
            ->add('description') // Assumé être un champ texte ou textarea
            ->add('price') // Assumé être un champ numérique
            ->add('quantity') // Assumé être un champ numérique
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => function(Category $category) {
                    return $category->getName(); // Ici on assume que l'entité Category a un champ `name`
                },
                'placeholder' => 'Choose a category', // Optionnel : ajoute un choix vide
            ]) // Il manquait cette fermeture de parenthèse
            ->add('submit', SubmitType::class, [ // Ajout du bouton de soumission
                'label' => 'Envoyer',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
