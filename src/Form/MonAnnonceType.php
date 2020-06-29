<?php

namespace App\Form;

use App\Entity\Ville;
use App\Entity\MonAnnonce;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class MonAnnonceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('carotteATroquer', TextType::class, ['mapped' => false,'label' => 'Je troque :'])
            ->add('QuantiteATroquer', NumberType::class, ['mapped' => false, 'html5' => true, 'scale' => 1, 'label' => 'Quantité :'])
            ->add('contreCarotte', TextType::class, ['mapped' => false,'label' => 'Contre :'])
            ->add('QuantiteContre', NumberType::class, ['mapped' => false,'html5' => true, 'scale' => 1,'label' => 'Quantité :'])
            ->add('ville', EntityType :: class, [
                'class' => Ville::class,
                'choice_label' => 'nom'
            ])
            ->add('Description', TextareaType::Class, ['attr' => ['rows' => 5]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => MonAnnonce::class,
        ]);
    }
}
