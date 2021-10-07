<?php


namespace App\Form\AdminForm;
use App\Entity\Credit;
use Form\AdminForm\Type\TauxType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class CreditAddType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder  ->add('taux', CollectionType::class, array(
            'entry_type' => TauxType::class,
            'prototype'    => true,
            'by_reference' => false,
            'allow_delete' => true,
            'allow_add' => true,
            'label' => false,
            'required' => false,
            'allow_extra_fields' => true
        ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Credit::class,
        ]);
    }

}