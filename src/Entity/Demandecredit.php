<?php

namespace App\Entity;

use App\Repository\DemandecreditRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Mapping\ClassMetadata;
use Webmozart\Assert\Assert;

use Symfony\Component\Validator\Constraints as Validator;

/**
 * @ORM\Entity(repositoryClass=DemandecreditRepository::class)
 */
class Demandecredit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom;


    /**
     * @ORM\Column(type="string", length=100)
     */
    private $mail;


    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $info_comp;

    /**
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $token;

    /**
     * @ORM\Column(type="string", length=50 , nullable=true)
     */
    private $secu_social;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $num_carte_identite;

    /**
     * @ORM\Column(type="string", length=20 ,nullable=true)
     */
    private $nationalite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $echeance_carte_identite;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $file_carte_identite;

    /**
     * @ORM\Column(type="datetime", length=30)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=30,nullable=true)
     */
    private $ville_naissance;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pays_naissance;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $registre_national_belge;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $numero_carte_identite;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $numero_attestation_enregistrement;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pays_carte_identite;

    /**
     * @ORM\Column(type="datetime", length=30)
     */
    private $validite_carte_identite;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $etat_civil;

    /**
     * @ORM\Column(type="string", length=30 ,nullable=true)
     */
    private $annee_belgique;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $habitation;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $numero_rue;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nom_rue;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $boite;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $code_postal;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $ville_residence;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $pays_residence;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_adresse;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $telephone_mobile;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $numero_compte;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_compte;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $type_emploi;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $emploi;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $secteur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $temps_contrat;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $type_contrat;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_contrat;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom_employeur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $adresse_employeur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $tel_employeur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $code_postal_employeur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $ville_employeur;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $pays_employeur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $salaire;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $pension_alimentaire;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $invalidite;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $allocation;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $pension;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $mutuelle;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $chomage;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $handicap;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $revenu_locatif;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $cheque_repas;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $voiture_societe;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $autres_revenus;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_autres_revenus;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $loyer;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $pension_alimentaire_payer;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $autres_charges;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description_autres_charges;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $nombre_enfants;

    /**
     * @ORM\Column(type="string", length=2)
     */
    private $nombre_credit;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $type_credit;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $organisme_preteur;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $montant_credit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $duree_credit;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $taux_credit;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $montant_echeance;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $debut_credit;

    /**
     * @ORM\Column(type="boolean", length=20)
     */
    private $remboursement_credit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $solde_credit;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type_bien;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $valeur_venale;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $montant_achat_hypo;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $duree_credit_hypo;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_echeance_hypo;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_debut_credit_hypo;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $montant_achat_voiture;
    
    /**
     * @ORM\Column(type="string", length=10)
     */
    private $acompte_voiture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $marque_voiture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $modele_voiture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $type_vendeur_voiture;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $nom_vendeur_voiture;

    /**
     * @ORM\Column(type="datetime", length=20)
     */
    private $date_premiere_circulation_voiture;
    

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;
        return $this;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }



    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }
    public function getSociete(): ?string
    {
        return $this->mail;
    }

    public function setSociete(string $societe): self
    {
        $this->societe = $societe;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(?string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getInfoComp(): ?string
    {
        return $this->info_comp;
    }

    public function setInfoComp(?string $info_comp): self
    {
        $this->info_comp = $info_comp;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getSecuSocial(): ?string
    {
        return $this->secu_social;
    }

    public function setSecuSocial(string $secu_social): self
    {
        $this->secu_social = $secu_social;

        return $this;
    }

    public function getNumCarteIdentite(): ?string
    {
        return $this->num_carte_identite;
    }

    public function setNumCarteIdentite(string $num_carte_identite): self
    {
        $this->num_carte_identite = $num_carte_identite;

        return $this;
    }

    public function getNationalite(): ?string
    {
        return $this->nationalite;
    }

    public function setNationalite(string $nationalite): self
    {
        $this->nationalite = $nationalite;

        return $this;
    }

    public function getEcheanceCarteIdentite(): ?string
    {
        return $this->echeance_carte_identite;
    }

    public function setEcheanceCarteIdentite(string $echeance_carte_identite): self
    {
        $this->echeance_carte_identite = $echeance_carte_identite;

        return $this;
    }

    public function getFileCarteIdentite(): ?string
    {
        return $this->file_carte_identite;
    }

    public function setFileCarteIdentite(string $file_carte_identite): self
    {
        $this->file_carte_identite = $file_carte_identite;

        return $this;
    }

    public function getDateNaissance(): ?DateTime
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(DateTime $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

        return $this;
    }

    public function getVilleNaissance(): ?string
    {
        return $this->ville_naissance;
    }

    public function setVilleNaissance(string $ville_naissance): self
    {
        $this->ville_naissance = $ville_naissance;

        return $this;
    }

    public function getPaysNaissance(): ?string
    {
        return $this->pays_naissance;
    }

    public function setPaysNaissance(string $pays_naissance): self
    {
        $this->pays_naissance = $pays_naissance;

        return $this;
    }

    public function getRegistreNationalBelge(): ?string
    {
        return $this->registre_national_belge;
    }

    public function setRegistreNationalBelge(string $registre_national_belge): self
    {
        $this->registre_national_belge = $registre_national_belge;

        return $this;
    }

    public function getNumeroCarteIdentite(): ?string
    {
        return $this->numero_carte_identite;
    }

    public function setNumeroCarteIdentite(string $numero_carte_identite): self
    {
        $this->numero_carte_identite = $numero_carte_identite;

        return $this;
    }

    public function getNumeroAttestationEnregistrement(): ?string
    {
        return $this->numero_attestation_enregistrement;
    }

    public function setNumeroAttestationEnregistrement(string $numero_attestation_enregistrement): self
    {
        $this->numero_attestation_enregistrement = $numero_attestation_enregistrement;

        return $this;
    }

    public function getPaysCarteIdentite(): ?string
    {
        return $this->pays_carte_identite;
    }

    public function setPaysCarteIdentite(string $pays_carte_identite): self
    {
        $this->pays_carte_identite = $pays_carte_identite;

        return $this;
    }

    public function getValiditeCarteIdentite(): ?DateTime
    {
        return $this->validite_carte_identite;
    }

    public function setValiditeCarteIdentite(DateTime $validite_carte_identite): self
    {
        $this->validite_carte_identite = $validite_carte_identite;

        return $this;
    }

    public function getEtatCivil(): ?string
    {
        return $this->etat_civil;
    }

    public function setEtatCivil(string $etat_civil): self
    {
        $this->etat_civil = $etat_civil;

        return $this;
    }

    public function getAnneeBelgique(): ?string
    {
        return $this->annee_belgique;
    }

    public function setAnneeBelgique(string $annee_belgique): self
    {
        $this->annee_belgique = $annee_belgique;

        return $this;
    }

    
    public function getHabitation(): ?string
    {
        return $this->habitation;
    }

    public function setHabitation(string $habitation): self
    {
        $this->habitation = $habitation;

        return $this;
    }

    public function getNumeroRue(): ?string
    {
        return $this->numero_rue;
    }

    public function setNumeroRue(string $numero_rue): self
    {
        $this->numero_rue = $numero_rue;

        return $this;
    }

    public function getNomRue(): ?string
    {
        return $this->numero_rue;
    }

    public function setNomRue(string $nom_rue): self
    {
        $this->nom_rue = $nom_rue;

        return $this;
    }

    public function getBoite(): ?string
    {
        return $this->boite;
    }

    public function setBoite(string $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVilleResidence(): ?string
    {
        return $this->ville_residence;
    }

    public function setVilleResidence(string $ville_residence): self
    {
        $this->ville_residence = $ville_residence;

        return $this;
    }

    public function getPaysResidence(): ?string
    {
        return $this->pays_residence;
    }

    public function setPaysResidence(string $pays_residence): self
    {
        $this->pays_residence = $pays_residence;

        return $this;
    }

    public function getDateAdresse(): ?DateTime
    {
        return $this->date_adresse;
    }

    public function setDateAdresse(?DateTime $date_adresse): self
    {
        $this->date_adresse = $date_adresse;

        return $this;
    }

    public function getTelephoneMobile(): ?string
    {
        return $this->telephone_mobile;
    }

    public function setTelephoneMobile(string $telephone_mobile): self
    {
        $this->telephone_mobile = $telephone_mobile;

        return $this;
    }

    public function getNumeroCompte(): ?string
    {
        return $this->numero_compte;
    }

    public function setNumeroCompte(string $numero_compte): self
    {
        $this->numero_compte = $numero_compte;

        return $this;
    }

    public function getDateCompte(): ?DateTime
    {
        return $this->date_compte;
    }

    public function setDateCompte(?DateTime $date_compte): self
    {
        $this->date_compte = $date_compte;

        return $this;
    }

    public function getTypeEmploi(): ?string
    {
        return $this->type_emploi;
    }

    public function setTypeEmploi(string $type_emploi): self
    {
        $this->type_emploi = $type_emploi;

        return $this;
    }

    public function getEmploi(): ?string
    {
        return $this->emploi;
    }

    public function setEmploi(string $emploi): self
    {
        $this->emploi = $emploi;

        return $this;
    }

    public function getSecteur(): ?string
    {
        return $this->secteur;
    }

    public function setSecteur(string $secteur): self
    {
        $this->secteur = $secteur;

        return $this;
    }

    public function getTempsContrat(): ?string
    {
        return $this->temps_contrat;
    }

    public function setTempsContrat(string $temps_contrat): self
    {
        $this->temps_contrat = $temps_contrat;

        return $this;
    }

    public function getTypeContrat(): ?string
    {
        return $this->secteur;
    }

    public function setTypeContrat(string $type_contrat): self
    {
        $this->type_contrat = $type_contrat;

        return $this;
    }

    public function getDateContrat(): ?DateTime
    {
        return $this->date_contrat;
    }

    public function setDateContrat(DateTime $date_contrat): self
    {
        $this->date_contrat = $date_contrat;

        return $this;
    }

    public function getNomEmployeur(): ?string
    {
        return $this->nom_employeur;
    }

    public function setNomEmployeur(string $nom_employeur): self
    {
        $this->nom_employeur = $nom_employeur;

        return $this;
    }

    public function getAdresseEmployeur(): ?string
    {
        return $this->adresse_employeur;
    }

    public function setAdresseEmployeur(string $adresse_employeur): self
    {
        $this->adresse_employeur = $adresse_employeur;

        return $this;
    }

    public function getTelEmployeur(): ?string
    {
        return $this->tel_employeur;
    }

    public function setTelEmployeur(string $tel_employeur): self
    {
        $this->tel_employeur = $tel_employeur;

        return $this;
    }

    public function getCodePostalEmployeur(): ?string
    {
        return $this->code_postal_employeur;
    }

    public function setCodePostalEmployeur(string $code_postal_employeur): self
    {
        $this->code_postal_employeur = $code_postal_employeur;

        return $this;
    }

    public function getVilleEmployeur(): ?string
    {
        return $this->ville_employeur;
    }

    public function setVilleEmployeur(string $ville_employeur): self
    {
        $this->ville_employeur = $ville_employeur;

        return $this;
    }

    public function getPaysEmployeur(): ?string
    {
        return $this->pays_employeur;
    }

    public function setPaysEmployeur(string $pays_employeur): self
    {
        $this->pays_employeur = $pays_employeur;

        return $this;
    }

    public function getSalaire(): ?string
    {
        return $this->salaire;
    }

    public function setSalaire(string $salaire): self
    {
        $this->salaire = $salaire;

        return $this;
    }

    public function getPensionAlimentaire(): ?string
    {
        return $this->pension_alimentaire;
    }

    public function setPensionAlimentaire(string $pension_alimentaire): self
    {
        $this->pension_alimentaire = $pension_alimentaire;

        return $this;
    }

    public function getInvalidite(): ?string
    {
        return $this->invalidite;
    }

    public function setInvalidite(string $invalidite): self
    {
        $this->invalidite = $invalidite;

        return $this;
    }

    public function getAllocation(): ?string
    {
        return $this->allocation;
    }

    public function setAllocation(string $allocation): self
    {
        $this->allocation = $allocation;

        return $this;
    }

    public function getPension(): ?string
    {
        return $this->pension;
    }

    public function setPension(string $pension): self
    {
        $this->pension = $pension;

        return $this;
    }

    public function getMutuelle(): ?string
    {
        return $this->mutuelle;
    }

    public function setMutuelle(string $mutuelle): self
    {
        $this->mutuelle = $mutuelle;

        return $this;
    }

    public function getChomage(): ?string
    {
        return $this->chomage;
    }

    public function setChomage(string $chomage): self
    {
        $this->chomage = $chomage;

        return $this;
    }

    public function getHandicap(): ?string
    {
        return $this->handicap;
    }

    public function setHandicap(string $handicap): self
    {
        $this->handicap = $handicap;

        return $this;
    }

    public function getRevenuLocatif(): ?string
    {
        return $this->revenu_locatif;
    }

    public function setRevenuLocatif(string $revenu_locatif): self
    {
        $this->revenu_locatif = $revenu_locatif;

        return $this;
    }

    public function getChequeRepas(): ?string
    {
        return $this->cheque_repas;
    }

    public function setChequeRepas(string $cheque_repas): self
    {
        $this->cheque_repas = $cheque_repas;

        return $this;
    }

    public function getVoitureSociete(): ?string
    {
        return $this->voiture_societe;
    }

    public function setVoitureSociete(string $voiture_societe): self
    {
        $this->voiture_societe = $voiture_societe;

        return $this;
    }

    public function getAutresRevenus(): ?string
    {
        return $this->autres_revenus;
    }

    public function setAutresRevenus(string $autres_revenus): self
    {
        $this->autres_revenus = $autres_revenus;

        return $this;
    }

    public function getDescriptionAutresRevenus(): ?string
    {
        return $this->description_autres_revenus;
    }

    public function setDescriptionAutresRevenus(string $description_autres_revenus): self
    {
        $this->description_autres_revenus = $description_autres_revenus;

        return $this;
    }

    public function getLoyer(): ?string
    {
        return $this->loyer;
    }

    public function setLoyer(string $loyer): self
    {
        $this->loyer = $loyer;

        return $this;
    }

    public function getPensionAlimentairePayer(): ?string
    {
        return $this->pension_alimentaire_payer;
    }

    public function setPensionAlimentairePayer(string $pension_alimentaire_payer): self
    {
        $this->pension_alimentaire_payer = $pension_alimentaire_payer;

        return $this;
    }

    public function getAutresCharges(): ?string
    {
        return $this->autres_charges;
    }

    public function setAutresCharges(string $autres_charges): self
    {
        $this->autres_charges = $autres_charges;

        return $this;
    }

    public function getDescriptionAutresCharges(): ?string
    {
        return $this->description_autres_charges;
    }

    public function setDescriptionAutresCharges(string $description_autres_charges): self
    {
        $this->description_autres_charges = $description_autres_charges;

        return $this;
    }

    public function getNombreEnfants(): ?string
    {
        return $this->nombre_enfants;
    }

    public function setNombreEnfants(string $nombre_enfants): self
    {
        $this->nombre_enfants = $nombre_enfants;

        return $this;
    }

    public function getNombreCredit(): ?string
    {
        return $this->nombre_credit;
    }

    public function setNombreCredit(string $nombre_credit): self
    {
        $this->nombre_credit = $nombre_credit;

        return $this;
    }

    public function getTypeCredit(): ?string
    {
        return $this->type_credit;
    }

    public function setTypeCredit(string $type_credit): self
    {
        $this->type_credit = $type_credit;

        return $this;
    }

    public function getOrganismePreteur(): ?string
    {
        return $this->organisme_preteur;
    }

    public function setOrganismePreteur(string $organisme_preteur): self
    {
        $this->organisme_preteur = $organisme_preteur;

        return $this;
    }

    public function getMontantCredit(): ?string
    {
        return $this->montant_credit;
    }

    public function setMontantCredit(string $montant_credit): self
    {
        $this->montant_credit = $montant_credit;

        return $this;
    }

    public function getDureeCredit(): ?string
    {
        return $this->duree_credit;
    }

    public function setDureeCredit(string $duree_credit): self
    {
        $this->duree_credit = $duree_credit;

        return $this;
    }

    public function getTauxCredit(): ?string
    {
        return $this->taux_credit;
    }

    public function setTauxCredit(string $taux_credit): self
    {
        $this->taux_credit = $taux_credit;

        return $this;
    }

    public function getMontantEcheance(): ?string
    {
        return $this->montant_echeance;
    }

    public function setMontantEcheance(string $montant_echeance): self
    {
        $this->montant_echeance = $montant_echeance;

        return $this;
    }

    public function getDebutCredit(): ?DateTime
    {
        return $this->debut_credit;
    }

    public function setDebutCredit(DateTime $debut_credit): self
    {
        $this->debut_credit = $debut_credit;

        return $this;
    }

    public function getRemboursementCredit(): ?bool
    {
        return $this->remboursement_credit;
    }

    public function setRemboursementCredit(bool $remboursement_credit): self
    {
        $this->remboursement_credit = $remboursement_credit;

        return $this;
    }

    public function getSoldeCredit(): ?string
    {
        return $this->solde_credit;
    }

    public function setSoldeCredit(string $solde_credit): self
    {
        $this->solde_credit = $solde_credit;

        return $this;
    }

    public function getTypeBien(): ?string
    {
        return $this->type_bien;
    }

    public function setTypeBien(string $type_bien): self
    {
        $this->type_bien = $type_bien;

        return $this;
    }

    public function getValeurVenale(): ?string
    {
        return $this->valeur_venale;
    }

    public function setValeurVenale(string $valeur_venale): self
    {
        $this->valeur_venale = $valeur_venale;

        return $this;
    }

    public function getMontantAchatHypo(): ?string
    {
        return $this->montant_achat_hypo;
    }

    public function setMontantAchatHypo(string $montant_achat_hypo): self
    {
        $this->montant_achat_hypo = $montant_achat_hypo;

        return $this;
    }

    public function getDureeCreditHypo(): ?string
    {
        return $this->duree_credit_hypo;
    }

    public function setDureeCreditHypo(string $duree_credit_hypo): self
    {
        $this->duree_credit_hypo = $duree_credit_hypo;

        return $this;
    }

    public function getDateEcheanceHypo(): ?DateTime
    {
        return $this->date_echeance_hypo;
    }

    public function setDateEcheanceHypo(DateTime $date_echeance_hypo): self
    {
        $this->date_echeance_hypo = $date_echeance_hypo;

        return $this;
    }

    public function getDateDebutCreditHypo(): ?DateTime
    {
        return $this->date_debut_credit_hypo;
    }

    public function setDateDebutCreditHypo(DateTime $date_debut_credit_hypo): self
    {
        $this->date_debut_credit_hypo = $date_debut_credit_hypo;

        return $this;
    }

    public function getMontantAchatVoiture(): ?string
    {
        return $this->montant_achat_voiture;
    }

    public function setMontantAchatVoiture(string $montant_achat_voiture): self
    {
        $this->montant_achat_voiture = $montant_achat_voiture;
        return $this;
    }

    public function getAcompteVoiture(): ?string
    {
        return $this->acompte_voiture;
    }

    public function setAcompteVoiture(string $acompte_voiture): self
    {
        $this->acompte_voiture = $acompte_voiture;
        return $this;
    }

    public function getMarqueVoiture(): ?string
    {
        return $this->marque_voiture;
    }

    public function setMarqueVoiture(string $marque_voiture): self
    {
        $this->marque_voiture = $marque_voiture;
        return $this;
    }

    public function getModeleVoiture(): ?string
    {
        return $this->modele_voiture;
    }

    public function setModeleVoiture(string $modele_voiture): self
    {
        $this->modele_voiture = $modele_voiture;
        return $this;
    }

    public function getTypeVendeurVoiture(): ?string
    {
        return $this->type_vendeur_voiture;
    }

    public function setTypeVendeurVoiture(string $type_vendeur_voiture): self
    {
        $this->type_vendeur_voiture = $type_vendeur_voiture;
        return $this;
    }

    public function getNomVendeurVoiture(): ?string
    {
        return $this->nom_vendeur_voiture;
    }

    public function setNomVendeurVoiture(string $nom_vendeur_voiture): self
    {
        $this->nom_vendeur_voiture = $nom_vendeur_voiture;
        return $this;
    }

    public function getDatePremiereCirculationVoiture(): ?string
    {
        return $this->date_premiere_circulation_voiture;
    }

    public function setDatePremiereCirculationVoiture(string $date_premiere_circulation_voiture): self
    {
        $this->date_premiere_circulation_voiture = $date_premiere_circulation_voiture;
        return $this;
    }

    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="prenom";
        $tbl[1]="nom";
        $tbl[2]="mail";
        $tbl[3]="societe";
        $tbl[4]="tel";
        $tbl[5]="info_comp";
        $tbl[6]="token";

        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];
        $tbl[0]="prenom";
        $tbl[1]="nom";
        $tbl[2]="mail";
        $tbl[3]="societe";
        $tbl[4]="tel";
        $tbl[5]="info_comp";
        $tbl[6]="token";

        return $tbl;


    }
    public function val() :array
    {
       $tbl = [];
        $tbl[0]=$this->getPrenom();
        $tbl[1]=$this->getNom();
        $tbl[2]=$this->getMail();
        $tbl[3]=$this->getSociete();
        $tbl[4]=$this->getTel();
        $tbl[5]=$this->getInfoComp();
        $tbl[6]=$this->getToken();

        
        return $tbl;


    }

    public function __toString()
    {
        // TODO: Implement __toString() method.

       /* $tbl=$this->getEmail()."-".$this->getFullName().'-'.$this->getPassword().'-'.$this->getUsername();
        */return "";
    }

    public static function loadValidatorMetadata(ClassMetadata $metadata){
        $metadata->addPropertyConstraint('nom', new Validator\Regex([
            'pattern' => '/[a-zA-Z]+/',
            'message' => 'Votre nom doit contenir uniquement des lettres'
        ]));
        $metadata->addPropertyConstraint('prenom', new Validator\Regex([
            'pattern' => '/[a-zA-Z]+/',
            'message' => 'Votre prénom doit contenir uniquement des lettres'
        ]));
    }

}
