<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Objet', TextType::class,[
                'attr' => [
                    'placeholder' => 'Objet de votre demande',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('Prenom', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('Nom', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre nom',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('Email', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('Telephone', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('Message', TextType::class,[
                'attr' => [
                    'placeholder' => 'Que pouvons nous faire pour vous',
                    'class' => 'input-form input-contact big-text-area'
                ]
            ])
            ->add('RGPD', CheckboxType::class,[
                    'label' => false
            ])
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'demande-pret montserrat-medium-white-14px'],
                'label' => 'ENVOYER'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
