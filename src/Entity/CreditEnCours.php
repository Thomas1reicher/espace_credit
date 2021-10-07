<?php

namespace App\Entity;

use App\Repository\CreditEnCoursRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditEnCoursRepository::class)
 */
class CreditEnCours
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $type_credit;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $org_pret;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $montant;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $duree_credit;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $taux;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $montant_echeance;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $date_debut;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $solde;

    /**
     * @ORM\Column(type="string", length=25, nullable=true)
     */
    private $montant_achat;

     /**
         * @ORM\ManyToOne(targetEntity=Demandecredit::class, inversedBy="credit_cours",cascade={"persist"})
         */
        private $demande_credit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeCredit(): ?string
    {
        return $this->type_credit;
    }

    public function setTypeCredit(?string $type_credit): self
    {
        $this->type_credit = $type_credit;

        return $this;
    }

    public function getOrgPret(): ?string
    {
        return $this->org_pret;
    }

    public function setOrgPret(?string $org_pret): self
    {
        $this->org_pret = $org_pret;

        return $this;
    }

    public function getMontant(): ?string
    {
        return $this->montant;
    }

    public function setMontant(?string $montant): self
    {
        $this->montant = $montant;

        return $this;
    }

    public function getDureeCredit(): ?string
    {
        return $this->duree_credit;
    }

    public function setDureeCredit(?string $duree_credit): self
    {
        $this->duree_credit = $duree_credit;

        return $this;
    }

    public function getTaux(): ?string
    {
        return $this->taux;
    }

    public function setTaux(?string $taux): self
    {
        $this->taux = $taux;

        return $this;
    }

    public function getMontantEcheance(): ?string
    {
        return $this->montant_echeance;
    }

    public function setMontantEcheance(?string $montant_echeance): self
    {
        $this->montant_echeance = $montant_echeance;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(?\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getSolde(): ?string
    {
        return $this->solde;
    }

    public function setSolde(?string $solde): self
    {
        $this->solde = $solde;

        return $this;
    }

    public function getMontantAchat(): ?string
    {
        return $this->montant_achat;
    }

    public function setMontantAchat(?string $montant_achat): self
    {
        $this->montant_achat = $montant_achat;

        return $this;
    }

    public function getDemandeCredit(): ?Demandecredit
    {
        return $this->demande_credit;
    }

    public function setDemandeCredit(?Demandecredit $demande_credit): self
    {
        $this->demande_credit = $demande_credit;

        return $this;
    }
    public function getList()
    {
        
        return (array) $this;
    }
    public function isDateTime($date) {
        return ($date instanceof \DateTime); /* edit */
    }
}
