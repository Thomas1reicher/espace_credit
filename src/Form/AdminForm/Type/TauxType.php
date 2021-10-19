<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 28/12/2017
 * Time: 15:25
 */

namespace Form\AdminForm\Type;


use Form\AdminForm\Type\SousTauxType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Model\Stage;
use Symfony\Component\Validator\Constraints\NotBlank;
use Validator\ForcedComment;
use Validator\UniquePerOrganization;
use App\Entity\Taux;

class TauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
              

                $builder->add('nom', TextType::class,
                    [
                        'attr' => [
                            'class' => 'input-form input-contact '
                        ],
                        'label' => 'nom',
                        'required' => false,
                    ]);
             
                    $builder  ->add('sous_taux', CollectionType::class, array(
                        
                        'entry_type' => SousTauxType::class,
                        'prototype'    => true,
                        'by_reference' => false,
                        'allow_delete' => true,
                        'allow_add' => true,
                        'label' => false,
                        'required' => false,
                        'prototype_name' => '__sous_taux_prot__',
                    ));

              

              

        




    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Taux::class,
           
        ]);
    }

}
