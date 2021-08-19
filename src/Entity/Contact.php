<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
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
    private $objet;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $message;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getTelephone(): ?string
    {
        return $this->telephone;
    }

    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }
    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="objet";
        $tbl[1]="nom";
        $tbl[2]="prenom";
        $tbl[3]="email";
        $tbl[4]="telephone";
        $tbl[5]="message";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];

        $tbl[0]="String";
        $tbl[1]="String";
        $tbl[2]="String";
        $tbl[3]="String";
        $tbl[4]="String";
        $tbl[5]="String";

        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        $tbl[0]=$this->getObjet();
        $tbl[1]=$this->getNom();
        $tbl[2]=$this->getPrenom();
        $tbl[3]=$this->getEmail();
        $tbl[4]=$this->getEmail();
        $tbl[5]=$this->getMessage();
        return $tbl;


    }
    public function __toString()
    {
        // TODO: Implement __toString() method.

        $tbl="";
        return $tbl;
    }
}
