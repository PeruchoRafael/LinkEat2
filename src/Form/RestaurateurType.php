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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;



class RestaurateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                'label' => 'Nom *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom valide'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Le nom doit contenir au minimum {{ limit }} caractères"
                    ]),
                ]
            ])

            ->add('first_name', TextType::class, [
                'label' => 'Prénom *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un prénom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Le nom doit contenir au minimum {{ limit }} caractères"
                    ]),
                ]
            ])

            ->add('email', TextType::class, [
                'label' => 'Saisissez votre adresse mail *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse mail valide'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => "L'email doit contenir au minimum {{ limit }} caractères"
                    ]),
                ]

            ])
            ->add('password', PasswordType::class, [
                'label' => 'Saisissez votre Mot de passe *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un mot de passe'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le mot de passe doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('phone', IntegerType::class, [ // Utilisez IntegerType pour les numéros de téléphone
                'label' => 'Numéro de téléphone *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un numero de téléphone'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le numéro de téléphone doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('location', TextareaType::class, [ // Utilisez TextareaType au lieu de TextAreaType
                'label' => 'Adresse *',
                'required' => true,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre adresse'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "Votre adresse doit contenir au minimum {{ limit }} caractères"
                    ]),
                ]
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

