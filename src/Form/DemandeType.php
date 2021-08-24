<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('titre', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'choices'  => [
                'Madame' => 'Madame',
                'Monsieur' => 'Monsieur',
                'Mademoiselle' => 'Mademoiselle',
            ]
        ])
        ->add('nom', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nom',
                'class' => 'input-form input-contact'
            ]
        ])
        ->add('prenom', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre prénom',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Prénom'
        ])
        
        ->add('date_naissance', BirthdayType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Date de naissance',
        ])
        
        ->add('ville_naissance', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre ville de naissance',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville de naissance'
        ])
        ->add('pays_naissance', CountryType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de naissance'
        ])
        ->add('registre_national_belge', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre registre national',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Registre national (uniquement pour les belges)'
        ])
        ->add('numero_carte_identite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de carte d\'identité',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de carte d\'identité'
        ])
        ->add('numero_attestation_enregistrement', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro d\'attestation d\'enregistrement',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro d\'attestation d\'enregistrement'
        ])
        ->add('pays_carte_identite', CountryType::class,[
            'attr' => [
                'placeholder' => 'Entrez la nationnalité de votre carte d\'identité',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de la carte d\'identité'
        ])
        ->add('validite_carte_identite', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date limite de validité de votre carte d\'identité',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Date de validité de la carte d\'identité'
        ])
        ->add('etat_civil', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'État Civil',
            'choices'  => [
                'Célibataire' => 'Célibataire',
                'Cohabitation' => 'Cohabitation',
                'Divorcé' => 'Divorcé',
                'Marié' => 'Marié',
                'Séparé corps et bien' => 'Séparé corps et bien',
                'Séparé de fait' => 'Séparé de fait',
                'Veuf(ve)' => 'Veuf'
            ]
        ])            



        ->add('habitation', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type d\'habitation',
            'choices'  => [
                'Locataire' => 'Locataire',
                'Propriétaire' => 'Propriétaire',
                'Cohabitation' => 'Cohabitation'
            ]
            
        ])
        ->add('nom_rue', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de votre rue',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom de rue'
        ])
        ->add('numero_rue', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de rue',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de rue'
        ])
     
        ->add('boite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre boîte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Boîte'
        ])
        ->add('code_postal', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre code postal',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Code Postal'
        ])
        ->add('ville_residence', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre ville de résidence',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville'
        ])
        ->add('pays_residence', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre pays de résidence',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays'
        ])
        
        ->add('date_adresse', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Installé depuis'
        ])
        ->add('tel', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone fixe',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Téléphone'
        ])
        ->add('telephone_mobile', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone mobile',
                'class' => 'input-form input-contact'
            ],
            'label' => 'GSM'
        ])
        ->add('mail', EmailType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre email',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Email'
        ])
        ->add('numero_compte', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de compte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de compte'
        ])
        ->add('date_compte', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Date d\'ouverture du compte'
        ])



        ->add('type_emploi', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type d\'Emploi',
            'choices'  => [
                'Chomeur' => 'Chomeur',
                'Diplomate' => 'Diplomate',
                'Employé' => 'Employé',
                'Etudiant' => 'Etudiant',
                'Fonctionnaire' => 'Fonctionnaire',
                'Indépendant' => 'Indépendant',
                'Invalide' => 'Invalide',
                'Maitresse de maison' => 'Maitresse de maison',
                'Membre du clergé' => 'Membre du clergé',
                'Mutuelle' => 'Mutuelle',
                'Ouvrier' => 'Ouvrier',
                'Prépensionné' => 'Prépensionné',
                'Retiré' => 'Retiré',
                'Retraite' => 'Retraite'
            ]
        ])
        ->add('emploi', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Emploi',
            'choices'  => [
                'Cadre' => 'Cadre',
                'Commerçant' => 'Commerçant',
                'Conducteur/Chauffeur' => 'Conducteur/Chauffeur',
                'Dirigeant' => 'Dirigeant',
                'Employé de bureau' => 'Employé de bureau',
                'Enseignement' => 'Enseignement',
                'Forces de l\'ordre/Pompier' => 'Forces de l\'ordre/Pompier',
                'Gardien/Sécurité' => 'Gardien/Sécurité',
                'Manoeuvre' => 'Manoeuvre',
                'Menage/Entretien' => 'Menage/Entretien',
                'Officier des forces armées' => 'Officier des forces armées',
                'Personnel ambassade' => 'Personnel ambassade',
                'Prestataire de service (para)médical' => 'Prestataire de service (para)médical',
                'Profession agricole' => 'Profession agricole',
                'Profession artistique' => 'Profession artistique',
                'Profession techniques' => 'Profession techniques',
                'Profession libérale' => 'Profession libérale',
                'Sans objet' => 'Sans objet',
                'Travailleur extérieur (docker)' => 'Travailleur extérieur (docker)',
                'Travailleur à la production' => 'Travailleur à la production',
                'Travailleur horeca' => 'Travailleur horeca',
                'Vendeur/Représentant' => 'Vendeur/Représentant'
            ]
        ])
        ->add('secteur', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Secteur d\'activité',
            'choices'  => [
                'Agriculture' => 'Agriculture',
                'Banque/Assurance' => 'Banque/Assurance',
                'Construction' => 'Construction',
                'Grande entreprise (+50 personnes)' => 'Grande entreprise (+50 personnes)',
                'Horeca/Courrier/Fitness/Taxe' => 'Horeca/Courrier/Fitness/Taxe',
                'Industrie' => 'Industrie',
                'Petite entreprise (-50 personnes)' => 'Petite entreprise (-50 personnes)',
                'Public' => 'Public',
                'Sans objet' => 'Sans objet'
            ]
        ])
        ->add('temps_contrat', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Temps plein / Temps partiel',
            'choices'  => [
                'Temps plein' => 'Temps plein',
                'Temps partiel' => 'Temps partiel'
            ]
        ])
        ->add('type_contrat', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de contrat',
            'choices'  => [
                'CDI' => 'CDI',
                'CDD' => 'CDD'
            ]
        ])
        ->add('date_contrat', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Date du contrat'
        ])



        ->add('nom_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom de l\'employeur'
        ])
        ->add('adresse_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez l\'adresse de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Adresse de l\'employeur'
        ])
        ->add('tel_employeur', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez le numéro de téléphone de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Téléphone de l\'employeur'
        ])
        ->add('code_postal_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le code postal de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Code postal de l\'employeur'
        ])
        ->add('ville_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la ville de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville de l\'employeur'
        ])
        ->add('pays_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le pays de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de l\'employeur'
        ])



        ->add('salaire', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre salaire',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Salaire'
        ])
        ->add('pension_alimentaire', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre pension alimentaire',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension alimentaire'
        ])
        ->add('invalidite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre invalidite',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Invalidite'
        ])
        ->add('allocation', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos allocations familiales',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Allocations familiales'
        ])
        ->add('pension', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre pension',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension'
        ])
        ->add('mutuelle', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre mutuelle',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Mutuelle'
        ])
        ->add('chomage', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre chomage',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Chomage'
        ])
        ->add('handicap', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos aides liées à un éventuel handicap',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Handicap'
        ])
        ->add('revenu_locatif', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos revenus locatifs',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Revenu locatif'
        ])
        ->add('cheque_repas', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos chèques repas',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Chèques Repas'
        ])
        ->add('voiture_societe', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre voiture de société',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Voiture de société'
        ])
        ->add('autres_revenus', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos autres revenus',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Autres revenus'
        ])
        ->add('description_autres_revenus', TextType::class,[
            'attr' => [
                'placeholder' => 'Décrivez vos autres revenus',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Description des autres revenus'
        ])



        ->add('loyer', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre loyer',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Loyer'
        ])
        ->add('pension_alimentaire_payer', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant des pensions alimentaires que vous payez',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension alimentaire payée'
        ])
        ->add('autres_charges', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos autres charges',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Autres charges'
        ])
        ->add('description_autres_charges', TextType::class,[
            'attr' => [
                'placeholder' => 'Décrivez vos autres charges',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Description des autres charges'
        ])
        ->add('nombre_enfants', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nombre d\'enfant(s)',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nombre d\'enfant(s)'
        ])



        ->add('nombre_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nombre de crédits en cours',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nombre de crédits en cours'
        ])
        ->add('type_credit', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de crédit',
            'choices'  => [
                'Prêt à tempérament' => 'Prêt à tempérament',
                'Prêt travaux' => 'Prêt travaux',
                'Prêt voiture' => 'Prêt voiture'
            ]
        ])
        ->add('organisme_preteur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre organisme prêteur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Organisme prêteur'
        ])
        ->add('montant_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos crédits',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant crédits'
        ])
        ->add('duree_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la durée du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Durée en mois du crédit'
        ])
        ->add('taux_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le taux du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Taux du crédit'
        ])
        ->add('montant_echeance', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de l\'échéance',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant échéance'
        ])
        ->add('debut_credit', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date de début du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Taux du crédit'
        ])
        ->add('remboursement_credit', CheckboxType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Remboursement d\'un crédit'
        ])
        ->add('solde_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le solde du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Solde du crédit (si disponible)'
        ])



        ->add('type_bien', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de bien',
            'choices'  => [
                'Maison d\'habitation' => 'Maison d\'habitation',
                'Maison de commerce' => 'Maison de commerce',
                'Seconde résidence' => 'Seconde résidence'
            ]
        ])
        ->add('valeur_venale', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la valeur vénale du bien',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Valeur vénale'
        ])
        ->add('montant_achat_hypo', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de l\'achat',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant de l\'achat'
        ])
        ->add('duree_credit_hypo', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la durée du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Durée du crédit'
        ])
        ->add('date_echeance_hypo', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date d\'échéance',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Échéance'
        ])
        ->add('date_debut_credit_hypo', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date de début',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Date de début'
        ])



        ->add('montant_achat_voiture', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant du véhicule'
        ])
        ->add('acompte_voiture', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de l\'acompte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant de l\'acompte du véhicule'
        ])
        ->add('marque_voiture', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la marque du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Marque du véhicule'
        ])
        ->add('modele_voiture', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le modèle du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Modèle du véhicule'
        ])
        ->add('type_vendeur_voiture', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de vendeur',
            'choices'  => [
                'Garage' => 'Garage',
                'Particulier' => 'Particulier'
            ]
        ])
        ->add('nom_vendeur_voiture', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom du vendeur du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant du véhicule'
        ])
        ->add('date_premiere_circulation_voiture', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant du véhicule'
        ])



        ->add('montant_achat_moto', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant du véhicule'
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
