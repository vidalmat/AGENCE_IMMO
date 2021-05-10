<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Client;
use App\Form\UserType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class ClientType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'attr' => [
                    'placeholder' => 'Prénom'
                    ]
                ])
            ->add('adresse', TextType::class, [
                'attr' => [
                    'placeholder' => 'Adresse'
                    ]
                ])
            ->add('tel', TextType::class, [
                'attr' => [
                    'placeholder' => 'Téléphone'
                    ]
                ])
            ->add('ville', TextType::class, [
                'attr' => [
                    'placeholder' => 'Ville'
                    ]
                ])
            ->add('cp', TextType::class, [
                'attr' => [
                    'placeholder' => "Code postal"
                    ]
                ])
        ;
        
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Client::class,
        ]);
    }
}
