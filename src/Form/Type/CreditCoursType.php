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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Model\Stage;
use Symfony\Component\Validator\Constraints\NotBlank;
use Validator\ForcedComment;
use Validator\UniquePerOrganization;
use App\Entity\CreditEnCours;

class CreditCoursType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {   
              

                $builder->add('type_credit', ChoiceType::class,[
                    'attr' => [
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Type de crédit',
                    'choices'  => [
                        'Prêt à tempérament' => 'Prêt à tempérament',
                        'Prêt travaux' => 'Prêt travaux',
                        'Prêt voiture' => 'Prêt voiture'
                    ],
                    'required' => false
                ])
                ->add('org_pret', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez votre organisme prêteur',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Organisme prêteur',
                    'required' => false
                ])
                ->add('montant', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez le montant de votre crédits',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Montant crédits',
                    'required' => false
                ])
                ->add('montant_achat', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez le montant de votre achat',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Montant achat',
                    'required' => false
                ])
                ->add('duree_credit', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez la durée du crédit',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Durée en mois du crédit',
                    'required' => false
                ])
                ->add('taux', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez le taux du crédit',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Taux du crédit',
                    'required' => false
                ])
                ->add('montant_echeance', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez le montant de l\'échéance',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Montant échéance',
                    'required' => false
                ])
                ->add('date_debut', DateType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez la date de début du crédit',
                        'class' => 'input-form input-contact date-css-symfony'
                    ],
                    'label' => 'Date de début du crédit',
                    'years' => range(date('Y')-100, date('Y')),
                    'required' => false,
                    'format' => 'yyyy-MM-dd',
                    'empty_data' => ''
                ])
         
                ->add('solde', TextType::class,[
                    'attr' => [
                        'placeholder' => 'Entrez le solde du crédit',
                        'class' => 'input-form input-contact'
                    ],
                    'label' => 'Solde du crédit (si disponible)',
                    'required' => false
                ]);

              

        




    }



    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CreditEnCours::class,
           
        ]);
    }

}
