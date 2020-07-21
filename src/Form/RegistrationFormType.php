<?php

namespace App\Form;

use App\Entity\User;
use App\Entity\Ville;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, [
                'label' => 'Nom :',
                'required' => 'true',
                'trim' => 'true'
            ])
            ->add('Prenom', TextType::class, [
                'label' => 'Prénom :',
                'required' => 'true',
                'trim' => 'true'
            ])
            ->add('Sexe', ChoiceType::class, [
                'label' => 'Sexe :',
                'empty_data' => 'F',
                'choices' => [
                    'F' => 'F',
                    'H' => 'H'
                ]
            ])
            ->add('ville', EntityType :: class, [
                'class' => Ville::class,
                'choice_label' => 'nom'
            ])
            ->add('email', EmailType::class, [
                'required' => 'true',
                'trim' => 'true',
                'label' => 'Email (identifiant) :'
            ])
            ->add('password', PasswordType::class, [
                'trim' => 'true'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
