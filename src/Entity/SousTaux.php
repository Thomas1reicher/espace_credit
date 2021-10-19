<?php

namespace App\Entity;

use App\Repository\SousTauxRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousTauxRepository::class)
 */
class SousTaux
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $periode_deb;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $periode_fin;

    /**
     * @ORM\ManyToOne(targetEntity=Taux::class, inversedBy="sous_taux")
     */
    private $id_taux;
    /**
    * @ORM\OneToMany(targetEntity=SousTauxPeriode::class, mappedBy="id_soustaux",cascade={"persist"})
    */
    private $sous_taux_period;

    public function __construct()
    {
        $this->sous_taux_period = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPeriodeDeb(): ?int
    {
        return $this->periode_deb;
    }

    public function setPeriodeDeb(?int $periode_deb): self
    {
        $this->periode_deb = $periode_deb;

        return $this;
    }

    public function getPeriodeFin(): ?int
    {
        return $this->periode_fin;
    }

    public function setPeriodeFin(?int $periode_fin): self
    {
        $this->periode_fin = $periode_fin;

        return $this;
    }

    public function getIdTaux(): ?Taux
    {
        return $this->id_taux;
    }

    public function setIdTaux(?Taux $id_taux): self
    {
        $this->id_taux = $id_taux;

        return $this;
    }

    /**
     * @return Collection|SousTauxPeriode[]
     */
    public function getSousTauxPeriod(): Collection
    {
        return $this->sous_taux_period;
    }

    public function addSousTauxPeriod(SousTauxPeriode $sousTauxPeriod): self
    {
        if (!$this->sous_taux_period->contains($sousTauxPeriod)) {
            $this->sous_taux_period[] = $sousTauxPeriod;
            $sousTauxPeriod->setIdSoustaux($this);
        }

        return $this;
    }

    public function removeSousTauxPeriod(SousTauxPeriode $sousTauxPeriod): self
    {
        if ($this->sous_taux_period->removeElement($sousTauxPeriod)) {
            // set the owning side to null (unless already changed)
            if ($sousTauxPeriod->getIdSoustaux() === $this) {
                $sousTauxPeriod->setIdSoustaux(null);
            }
        }

        return $this;
    }
}
