<?php

namespace App\Form;

use App\Entity\Credit;
use DateTime;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Choice;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class DemandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('type_credit_demande', EntityType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'required' => false,
            'label' => false,
            'class' => Credit::class,
            'choice_label' => 'nom',
            'expanded' => false,
            'multiple' => false
        ])


        ->add('titre', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'choices'  => [
                'Madame' => 'Madame',
                'Monsieur' => 'Monsieur',
                'Mademoiselle' => 'Mademoiselle',
            ],
            'required' => false
        ])
        ->add('nom', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nom',
                'class' => 'input-form input-contact'
            ],
            'required' => false
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
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date de naissance',
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => '1900-01-01'
        ])
        
        ->add('ville_naissance', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre ville de naissance',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville de naissance',
            'required' => false
        ])
        ->add('pays_naissance', CountryType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de naissance',
            'required' => false,
           
        ])
        ->add('registre_national_belge', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre registre national',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Registre national (uniquement pour les belges)',
            'required' => false
        ])
        ->add('numero_carte_identite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de carte d\'identité',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de carte d\'identité',
            'required' => false
        ])
        ->add('numero_attestation_enregistrement', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro d\'attestation d\'enregistrement',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro d\'attestation d\'enregistrement',
            'required' => false
        ])
        ->add('pays_carte_identite', CountryType::class,[
            'attr' => [
                'placeholder' => 'Entrez la nationnalité de votre carte d\'identité',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de la carte d\'identité',
            'required' => false
        ])
        ->add('validite_carte_identite', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date limite de validité de votre carte d\'identité',
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date de validité de la carte d\'identité',
            'years' => range(date('Y'), date('Y') + 30),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
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
            ],
            'required' => false
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
            ],
            'required' => false
            
        ])
        ->add('nom_rue', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de votre rue',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom de rue',
            'required' => false
        ])
        ->add('numero_rue', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de rue',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de rue',
            'required' => false
        ])
     
        ->add('boite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre boîte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Boîte',
            'required' => false
        ])
        ->add('code_postal', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre code postal',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Code Postal',
            'required' => false
        ])
        ->add('ville_residence', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre ville de résidence',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville',
            'required' => false
        ])
        ->add('pays_residence', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre pays de résidence',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays',
            'required' => false
        ])
        
        ->add('date_adresse', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Installé depuis',
            'years' => range(date('Y')-100, date('Y')),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
        ])
        ->add('tel', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone fixe',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Téléphone',
            'required' => false
        ])
        ->add('telephone_mobile', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de téléphone mobile',
                'class' => 'input-form input-contact'
            ],
            'label' => 'GSM',
            'required' => false
        ])
        ->add('mail', EmailType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre email',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Email',
            'required' => false
        ])
        ->add('numero_compte', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre numéro de compte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de compte (IBAN)',
            'required' => false
        ])
        ->add('date_compte', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date d\'ouverture du compte',
            'years' => range(date('Y')-100, date('Y')),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
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
            ],
            'required' => false
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
            ],
            'required' => false
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
            ],
            'required' => false
        ])
        ->add('temps_contrat', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Temps plein / Temps partiel',
            'choices'  => [
                'Temps plein' => 'Temps plein',
                'Temps partiel' => 'Temps partiel'
            ],
            'required' => false
        ])
        ->add('type_contrat', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de contrat',
            'choices'  => [
                'CDI' => 'CDI',
                'CDD' => 'CDD'
            ],
            'required' => false
        ])
        ->add('date_contrat', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date du contrat',
            'years' => range(date('Y')-100, date('Y')),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
        ])



        ->add('nom_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom de l\'employeur',
            'required' => false
        ])
        ->add('nom_rue_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom de rue de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom de rue de l\'employeur',
            'required' => false
        ])
        ->add('numero_rue_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le numéro de rue de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Numéro de rue de l\'employeur',
            'required' => false
        ])
        ->add('tel_employeur', TelType::class,[
            'attr' => [
                'placeholder' => 'Entrez le numéro de téléphone de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Téléphone de l\'employeur',
            'required' => false
        ])
        ->add('code_postal_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le code postal de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Code postal de l\'employeur',
            'required' => false
        ])
        ->add('ville_employeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la ville de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Ville de l\'employeur',
            'required' => false
        ])
        ->add('pays_employeur', CountryType::class,[
            'attr' => [
                'placeholder' => 'Entrez le pays de votre employeur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pays de l\'employeur',
            'required' => false
        ])



        ->add('salaire', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre salaire',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Salaire',
            'required' => false
        ])
        ->add('pension_alimentaire', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre pension alimentaire',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension alimentaire',
            'required' => false
        ])
        ->add('invalidite', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre invalidite',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Invalidite',
            'required' => false
        ])
        ->add('allocation', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos allocations familiales',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Allocations familiales',
            'required' => false
        ])
        ->add('pension', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre pension',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension',
            'required' => false
        ])
        ->add('mutuelle', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre mutuelle',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Mutuelle',
            'required' => false
        ])
        ->add('chomage', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre chomage',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Chomage',
            'required' => false
        ])
        ->add('handicap', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos aides liées à un éventuel handicap',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Handicap',
            'required' => false
        ])
        ->add('revenu_locatif', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos revenus locatifs',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Revenu locatif',
            'required' => false
        ])
        ->add('cheque_repas', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos chèques repas',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Chèques Repas',
            'required' => false
        ])
        ->add('voiture_societe', CheckboxType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre voiture de société',
                'class' => 'input-form input-contact checkbox-css-symfony'
            ],
            'label' => 'Voiture de société',
            'required' => false
        ])
        ->add('autres_revenus', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos autres revenus',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Autres revenus',
            'required' => false
        ])
        ->add('description_autres_revenus', TextType::class,[
            'attr' => [
                'placeholder' => 'Décrivez vos autres revenus',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Description des autres revenus',
            'required' => false
        ])



        ->add('loyer', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de votre loyer',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Loyer',
            'required' => false
        ])
        ->add('pension_alimentaire_payer', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant des pensions alimentaires que vous payez',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Pension alimentaire payée',
            'required' => false
        ])
        ->add('autres_charges', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos autres charges',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Autres charges',
            'required' => false
        ])
        ->add('description_autres_charges', TextType::class,[
            'attr' => [
                'placeholder' => 'Décrivez vos autres charges',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Description des autres charges',
            'required' => false
        ])
        ->add('nombre_enfants', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nombre d\'enfant(s)',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nombre d\'enfant(s)',
            'required' => false
        ])



        ->add('nombre_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre nombre de crédits en cours',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nombre de crédits en cours',
            'required' => false
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
            ],
            'required' => false
        ])
        ->add('organisme_preteur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez votre organisme prêteur',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Organisme prêteur',
            'required' => false
        ])
        ->add('montant_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de vos crédits',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant crédits',
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
        ->add('taux_credit', TextType::class,[
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
        ->add('debut_credit', DateType::class,[
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
        ->add('remboursement_credit', CheckboxType::class,[
            'attr' => [
                'class' => 'input-form input-contact checkbox-css-symfony'
            ],
            'label' => 'Remboursement d\'un crédit',
            'required' => false
        ])
        ->add('solde_credit', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le solde du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Solde du crédit (si disponible)',
            'required' => false
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
            ],
            'required' => false
        ])
        ->add('valeur_venale', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la valeur vénale du bien',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Valeur vénale',
            'required' => false
        ])
        ->add('type_taux_voiture', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de taux pour votre voiture',
            'choices'  => [
                'Taux normal' => 'Taux normal',
                'Taux ballon' => 'Taux ballon'
            ],
            'required' => false
        ])
        ->add('montant_achat', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de l\'achat',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant de l\'achat',
            'required' => false
        ])
        ->add('duree_credit_hypo', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la durée du crédit',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Durée du crédit',
            'required' => false
        ])
        ->add('date_echeance_hypo', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date d\'échéance',
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Échéance',
            'years' => range(date('Y'), date('Y') + 100),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
        ])
        ->add('date_debut_credit_hypo', DateType::class,[
            'attr' => [
                'placeholder' => 'Entrez la date de début',
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date de début',
            'years' => range(date('Y')-100, date('Y')),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
        ])



        ->add('acompte', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le montant de l\'acompte',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Montant de l\'acompte du véhicule',
            'required' => false
        ])
        ->add('marque', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez la marque du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Marque du véhicule',
            'required' => false
        ])
        ->add('modele', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le modèle du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Modèle du véhicule',
            'required' => false
        ])
        ->add('type_vendeur', ChoiceType::class,[
            'attr' => [
                'class' => 'input-form input-contact'
            ],
            'label' => 'Type de vendeur',
            'choices'  => [
                'Garage' => 'Garage',
                'Particulier' => 'Particulier'
            ],
            'required' => false
        ])
        ->add('nom_vendeur', TextType::class,[
            'attr' => [
                'placeholder' => 'Entrez le nom du vendeur du véhicule',
                'class' => 'input-form input-contact'
            ],
            'label' => 'Nom du vendeur',
            'required' => false
        ])
        ->add('date_premiere_circulation', DateType::class,[
            'attr' => [
                'class' => 'input-form input-contact date-css-symfony'
            ],
            'label' => 'Date de première circulation du véhicule',
            'years' => range(date('Y')-100, date('Y')),
            'required' => false,
            'format' => 'yyyy-MM-dd',
            'empty_data' => ''
        ])



        ->add('Envoyer', SubmitType::class, [
            'attr' => ['class' => 'demande-pret montserrat-medium-white-14px',
                        'style' => 'background-color: orange;border: none;border-radius: 10px;'],
            'label' => 'ENVOYER MA DEMANDE'
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
