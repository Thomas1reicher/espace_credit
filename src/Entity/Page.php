<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PageRepository::class)
 */
class Page
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
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sous_titre;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alias;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getSousTitre(): ?string
    {
        return $this->sous_titre;
    }

    public function setSousTitre(string $sous_titre): self
    {
        $this->sous_titre = $sous_titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAlias(): ?string
    {
        return $this->alias;
    }

    public function setAlias(string $alias): self
    {
        $this->alias = $alias;

        return $this;
    }

    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="titre";
        $tbl[1]="sous_titre";
        $tbl[2]="description";
        $tbl[3]="alias";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];
        $tbl[0]="String";
        $tbl[1]="String";
        $tbl[2]="textarea";
        $tbl[3]="String";
        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        $tbl[0]=$this->getTitre();
        $tbl[1]=$this->getSousTitre();
        $tbl[2]=$this->getDescription();
        $tbl[3]=$this->getAlias();
        return $tbl;


    }

    public function __toString()
    {
        // TODO: Implement __toString() method.

        $tbl="";
        return $tbl;
    }
}
