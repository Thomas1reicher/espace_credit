<?php

namespace App\Form;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DemandePretType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        /*
        ->add('Type', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de prêt'
        ])
        ->add('Montant', TextType::class,[
            'attr' => [
                'placeholder' => '14.000',
                'class' => 'input-form input-contact'
            ]
        ])
        ->add('Duree', TextType::class,[
            'attr' => [
                'placeholder' => '60 mois',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Durée'
        ])
        */
        ->add('prenom', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre prénom',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Prénom'
        ])
        ->add('nom', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nom',
                'class' => 'input-form input-contact'
            ]
        ])
        ->add('societe', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de votre société',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Société',
            'mapped' => false
        ])
        ->add('mail', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre adrese email',
                'class' => 'input-form input-contact'
            ]
        ])
        ->add('tel', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Téléphone'
        ])
        ->add('info_comp', TextType::class,[
            'attr' => [
                'placeholder' => 'Vous pouvez ajouter des précisions si besoin',
                'class' => 'input-form input-contact big-text-area'
            ],
            'label' => 'Informations complémentaires'
        ])
        ->add('RGPD', CheckboxType::class,[
            'label' => false,
            'mapped' => false
        ])
        ->add('Envoyer', SubmitType::class, [
            'attr' => ['class' => 'demande-pret montserrat-medium-white-14px'],
            'label' => 'ENVOYER MA DEMANDE'
        ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
