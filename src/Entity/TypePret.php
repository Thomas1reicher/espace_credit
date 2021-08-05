<?php

namespace App\Entity;

use App\Repository\TypePretRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TypePretRepository::class)
 */
class TypePret
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=SousTypePret::class, mappedBy="type_pret")
     */
    private $sousTypePrets;

    public function __construct()
    {
        $this->sousTypePrets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|SousTypePret[]
     */
    public function getSousTypePrets(): Collection
    {
        return $this->sousTypePrets;
    }

    public function addSousTypePret(SousTypePret $sousTypePret): self
    {
        if (!$this->sousTypePrets->contains($sousTypePret)) {
            $this->sousTypePrets[] = $sousTypePret;
            $sousTypePret->setTypePret($this);
        }

        return $this;
    }

    public function removeSousTypePret(SousTypePret $sousTypePret): self
    {
        if ($this->sousTypePrets->removeElement($sousTypePret)) {
            // set the owning side to null (unless already changed)
            if ($sousTypePret->getTypePret() === $this) {
                $sousTypePret->setTypePret(null);
            }
        }

        return $this;
    }
}
