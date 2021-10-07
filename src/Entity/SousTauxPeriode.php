<?php

namespace App\Entity;

use App\Repository\SousTauxPeriodeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousTauxPeriodeRepository::class)
 */
class SousTauxPeriode
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $montant_min;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $montant_max;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $taeg;
       /**
     * @ORM\ManyToOne(targetEntity=SousTaux::class, inversedBy="sous_taux_period")
     */
    private $id_soustaux;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMontantMin(): ?int
    {
        return $this->montant_min;
    }

    public function setMontantMin(int $montant_min): self
    {
        $this->montant_min = $montant_min;

        return $this;
    }

    public function getMontantMax(): ?int
    {
        return $this->montant_max;
    }

    public function setMontantMax(?int $montant_max): self
    {
        $this->montant_max = $montant_max;

        return $this;
    }

    public function getTaeg(): ?float
    {
        return $this->taeg;
    }

    public function setTaeg(?float $taeg): self
    {
        $this->taeg = $taeg;

        return $this;
    }

    public function getIdSoustaux(): ?SousTaux
    {
        return $this->id_soustaux;
    }

    public function setIdSoustaux(?SousTaux $id_soustaux): self
    {
        $this->id_soustaux = $id_soustaux;

        return $this;
    }
}
