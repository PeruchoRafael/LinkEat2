<?php

namespace App\Form;

use App\Entity\Restaurateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class RestaurateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom de votre restaurant',
                'required' => true,
            ])
            ->add('email', TextType::class, [
                'label' => 'Saisissez votre adresse mail',
                'required' => true,
            ])
            ->add('password', PasswordType::class, [
                'label' => 'Saisissez votre Mot de passe',
                'required' => true,
            ])
            ->add('premium', ChoiceType::class, [
                'label' => 'Premium',
                'required' => true,
                'choices' => [
                    'Oui' => true,
                    'Non' => false,
                ],
                'expanded' => true, // Affiche les choix comme des cases à cocher
                'multiple' => false, // Permet à l'utilisateur de cocher une seule option
            ])
            ->add('phone', IntegerType::class, [ // Utilisez IntegerType pour les numéros de téléphone
                'label' => 'Numéro de téléphone',
                'required' => true,
            ])
            ->add('location', TextareaType::class, [ // Utilisez TextareaType au lieu de TextAreaType
                'label' => 'Adresse',
                'required' => true,
            ])

            ->add('submit', SubmitType::class, [
                'label' => 'Envoyer',
            ]);

        }
    

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Restaurateur::class,
        ]);
    }
}

