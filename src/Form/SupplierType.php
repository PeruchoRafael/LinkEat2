<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Supplier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupplierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'label' => "Veuillez saisir votre adresse mail",
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
                'required' => true,
                'label' => "Veuillez saisir votre mot de passe",
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

            ->add('name', TextType::class, [
                'required' => true,
                'label' => "Votre prénom",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un prénom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le prénom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('firstName', TextType::class, [
                'required' => true,
                'label' => "Votre nom de famille",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un nom'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('companyName', TextType::class, [
                'required' => true,
                'label' => "Nom de votre agence",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir le nom de votre agence'
                    ]),
                    new Length([
                        'min' => 5,
                        'minMessage' => 'Le nom de votre agence doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('description', TextareaType::class, [
                'required' => true,
                'label' => "Votre description personnel",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une description'
                    ]),
                    new Length([
                        'min' => 10,
                        'minMessage' => 'La description doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('siretNumber', TextType::class, [
                'required' => true,
                'label' => "Numéro de SIRET",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un numéro de SIRET'
                    ]),
                    new Length([
                        'min' => 14,
                        'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('postalAddress', TextType::class, [
                'required' => true,
                'label' => "Nom de votre adresse postale",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir votre adresse postale'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => "L'adresse postale doit contenir au minimum {{ limit }} caractères"
                    ]),
                ]
             ])

            ->add('country', TextType::class, [
                'required' => true,
                'label' => "Nom de votre pays",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un pays'
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('city', TextType::class, [
                'required' => true,
                'label' => "Nom de votre ville",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une ville'
                    ]),
                    new Length([
                        'min' => 4,
                        'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('address', TextareaType::class, [
                'required' => true,
                'label' => "Adresse complète de l'agence",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse'
                    ]),
                    new Length([
                        'min' => 2,
                        'minMessage' => 'Le nom doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
            ])

            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'id',
            ])
            ->add('save', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Supplier::class,
        ]);
    }
}
