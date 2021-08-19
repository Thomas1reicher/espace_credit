<?php

namespace App\Form;

use App\Entity\Contact;
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
            ->add('objet', TextType::class,[
                'attr' => [
                    'placeholder' => 'Objet de votre demande',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('prenom', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre prénom',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('nom', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre nom',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('email', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre adresse email',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('telephone', TextType::class,[
                'attr' => [
                    'placeholder' => 'Entrez votre numéro de téléphone',
                    'class' => 'input-form input-contact'
                ]
            ])
            ->add('message', TextType::class,[
                'attr' => [
                    'placeholder' => 'Que pouvons nous faire pour vous',
                    'class' => 'input-form input-contact big-text-area'
                ]
            ])
   
            ->add('Envoyer', SubmitType::class, [
                'attr' => ['class' => 'demande-pret montserrat-medium-white-14px'],
                'label' => 'ENVOYER'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
