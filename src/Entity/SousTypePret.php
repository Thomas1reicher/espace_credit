<?php

namespace App\Entity;

use App\Repository\SousTypePretRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SousTypePretRepository::class)
 */
class SousTypePret
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $taeg;

    /**
     * @ORM\ManyToOne(targetEntity=TypePret::class, inversedBy="sousTypePrets")
     */
    private $type_pret;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getTaeg(): ?float
    {
        return $this->taeg;
    }

    public function setTaeg(float $taeg): self
    {
        $this->taeg = $taeg;

        return $this;
    }

    public function getTypePret(): ?TypePret
    {
        return $this->type_pret;
    }

    public function setTypePret(?TypePret $type_pret): self
    {
        $this->type_pret = $type_pret;

        return $this;
    }
}
