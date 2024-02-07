<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\User;
use App\Entity\Supplier;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
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
                'label' => "Adresse email",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir une adresse mail valide'
                    ]),
                ]
            ])

            ->add('password', PasswordType::class, [
                'required' => true,
                'label' => "Mot de passe",
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

            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Les mots de passe doivent correspondre.',
                'first_options'  => [
                    'label' => 'Mot de passe',
                    'attr' => ['class' => 'form-control mb-3'],
                ],
                'second_options' => [
                    'label' => 'Confirmez le mot de passe',
                    'attr' => ['class' => 'form-control mb-3']
                ],
                'required' => true,
                'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 6]),
                ],
            ])

            ->add('name', TextType::class, [
                'required' => true,
                'label' => "Prénom",
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
                'label' => "Nom de famille",
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
                'label' => "Nom de l\'agence",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir le nom de votre agence'
                    ]),
                    new Length([
                        'min' => 3,
                        'minMessage' => 'Le nom de votre agence doit contenir au minimum {{ limit }} caractères'
                    ]),
                ]
             ])

            ->add('description', TextareaType::class, [
                'required' => true,
                'label' => "Description personnelle",
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

            ->add('siretNumber', TelType::class, [
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

            ->add('postalAddress', TelType::class, [
                'required' => true,
                'label' => "Adresse postale",
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

            ->add('country', CountryType::class, [
                'required' => true,
                'label' => "Pays",
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez saisir un pays'
                    ]),
                ]
             ])

            ->add('city', TextType::class, [
                'required' => true,
                'label' => "Ville",
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
                'choice_label' => 'name',
                'label' => 'Catégorie'
            ])
            ->add('save', SubmitType::class, [
                'label' => 'Enregistrer',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Supplier::class,
        ]);
    }
}
