<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\Carotte;
use App\Entity\MonAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MonAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('CarotteATroquer', EntityType::class, [
                'label' => 'Je troque :',
                'placeholder' => "Sélectionner 'la carotte' à troquer",
                'class' => Carotte::class,
                'choice_label' => 'Nom',
            ])
            ->add('Quantity', NumberType::class, [
                'html5' => true, 
                'scale' => 1, 
                'label' => 'Quantité :'
            ])
            ->add('Unite', ChoiceType::class, [
                'label' => 'Unité :',
                'placeholder' => 'Choisir une option',
                'choices' => [
                    'Kg' => 'Kg',
                    'g' => 'g',
                    'L' => 'L',
                    'unité(s)' => 'unité(s)'
                ]
            ])
            ->add('Bio', ChoiceType::class, [
                'label' => 'Bio :',
                'placeholder' => 'Choisir une option',
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('ContreCarotte', EntityType::class, [
                'label' => 'Contre :',
                'placeholder' => "Sélectionner 'la carotte' cherchée",
                'class' => Carotte::class,
                'choice_label' => 'Nom',
            ])
            ->add('ContreQuantite', NumberType::class, [
                'html5' => true, 
                'scale' => 1, 
                'label' => 'Quantité :'
            ])
            ->add('ContreUnite', ChoiceType::class, [
                'label' => 'Unité :',
                'placeholder' => 'Choisir une option',
                'choices' => [
                    'Kg' => 'Kg',
                    'g' => 'g',
                    'L' => 'L',
                    'unité(s)' => 'unité(s)'
                ]
            ])
            ->add('ContreBio', ChoiceType::class, [
                'label' => 'Bio :',
                'placeholder' => 'Choisir une option',
                'choices' => [
                    'Oui' => 'Oui',
                    'Non' => 'Non'
                ]
            ])
            ->add('ville', EntityType :: class, [
                'class' => Ville::class,
                'choice_label' => 'nom'
            ])
            ->add('Description', TextareaType::Class, [
                'label' => 'Votre message :',
                'attr' => ['rows' => 3]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MonAnnonce::class,
        ]);
    }
}
