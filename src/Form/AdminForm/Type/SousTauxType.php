<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 28/12/2017
 * Time: 15:25
 */

namespace Form\AdminForm\Type;



use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
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
use App\Entity\SousTaux;

class SousTauxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
              

                $builder->add('periode_deb', NumberType::class,
                    [
                        'attr' => [
                            'class' => "input-form input-contact"
                        ],
                        'label' => "periode de début",
                        'required' => false,
                    ]);
             
                    $builder->add('periode_fin', IntegerType::class,
                    [
                        'attr' => [
                            'class' => "input-form input-contact"
                        ],
                        'label' => "periode de fin",
                        'required' => false,
                    ]);
                    $builder  ->add('sous_taux_period', CollectionType::class, array(
                        
                        'entry_type' => SousTauxTypePeriod::class,
                        'prototype'    => true,
                        'by_reference' => false,
                        'allow_delete' => true,
                        'allow_add' => true,
                        'label' => false,
                        'required' => false,
                        'prototype_name' => '__sous_taux_period_prot__',
                    ));
              

              

        




    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SousTaux::class,
           
        ]);
    }

}
