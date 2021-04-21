<?php

namespace App\Form;

use App\Entity\Calendrier;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ColorType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CalendrierType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre')
            ->add('debut', DateTimeType::class, [
                "date_widget" => "single_text"
            ])
            ->add('fin', DateTimeType::class, [
                "date_widget" => "single_text"
            ])
            ->add('description')
            ->add('journee')
            ->add('couleur_fond', ColorType::class)
            ->add('couleur_bordure', ColorType::class)
            ->add('couleur_texte', ColorType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Calendrier::class,
        ]);
    }
}
