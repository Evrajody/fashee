<?php

namespace App\Form;

use App\Entity\Client;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add("nom", TextType::class, [
            "required" => true,
            "attr" => [
                'placeholder' => "Entrez votre nom",
            ]
        ])

        ->add("prenom", TextType::class, [
            "required" => true,
            "attr" => [
                'placeholder' => "Entrez votre prenom",
            ]
        ])

        // ->add("sexe", ChoiceType::class, [
        //     "choices" => [
        //         "Homme" => "Masculin",
        //         "Femme" => "Feminin",
        //     ],
        //     "attr" => [
        //   
        //         'placeholder' => "Entrez votre sexe",
        //     ]
        // ])

        ->add("address", TextType::class, [
            "required" => true,
            "attr" => [
                'placeholder' => "Entrez votre adresse",
            ]
        ])

        ->add("email", EmailType::class, [
            "required" => true,
            "attr" => [
                'placeholder' => "Entrez votre email",
            ]
        ])

        ->add("plainPassword", RepeatedType::class, [
            'type' => PasswordType::class,
            'required' => true,
            'mapped' => false,
            'invalid_message' => 'The password fields must match.',
            
            'first_options'  => [
                'attr' => [
                    'autocomplete' => 'new-password',
                    'placeholder' => "Entrez votre mot de passe",
                ],
            ],

            'second_options' => [
                'attr' => [
                    'placeholder' => "Confirmer votre mot de passe",
                ],
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
