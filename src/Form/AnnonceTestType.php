<?php

namespace App\Form;

use App\Entity\MonAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnnonceTestType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Date')
            ->add('Description')
            ->add('Photo')
            ->add('User')
            ->add('troc')
            ->add('ville')
            ->add('Statut')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MonAnnonce::class,
        ]);
    }
}
