<?php
/**
 * Created by IntelliJ IDEA.
 * User: Faventyne
 * Date: 28/12/2017
 * Time: 15:25
 */

namespace Form\Type;



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

class PersonneChargeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
              

                $builder->add('enfant', CheckboxType::class,
                    [
                        'attr' => [
                            'class' => 'input-form input-contact checkbox-css-symfony'
                        ],
                        'label' => 'Enfant',
                        'required' => false,
                    ]);

                $builder->add('age', NumberType::class,
                    [   
                        'attr' => [
                            'class' => 'input-form input-contact'
                        ],
                        'label' => 'Âge de la personne a charge',
                        'required' => false,
                    ]);

              

        




    }


    public function getParent()
    {
        return FormType::class;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonneChargeType::class,
           
        ]);
    }

}
