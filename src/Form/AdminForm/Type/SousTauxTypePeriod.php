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
use Symfony\Component\Form\Extension\Core\Type\FloatType;
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
use App\Entity\SousTauxPeriode;

class SousTauxTypePeriod extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    { 
              

                $builder->add('montant_min', NumberType::class,
                    [
                        'attr' => [
                            'class' => "input-form input-contact"
                        ],
                        'label' => "Montant de début",
                        'required' => false,
                    ]);
             
                    $builder->add('montant_max', IntegerType::class,
                    [
                        'attr' => [
                            'class' => "input-form input-contact"
                        ],
                        'label' => "Montant de fin",
                        'required' => false,
                    ]);
                    $builder->add('taeg', NumberType::class,
                    [
                        'attr' => [
                            'class' => "input-form input-contact"
                        ],
                        'label' => "taeg",
                        'required' => false,
                    ]);
                 

              

              

        




    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => SousTauxPeriode::class,
           
        ]);
    }

}
