<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CreditRepository::class)
 */
class Credit
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
    private $nom;

    public function getId(): ?int
    {
        return $this->id;
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
    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="nom";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];

        $tbl[0]="String";

        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        $tbl[0]=$this->getNom();
        return $tbl;


    }
    public function __toString()
    {
        // TODO: Implement __toString() method.

        $tbl="";
        return $tbl;
    }

}
