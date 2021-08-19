<?php

namespace App\Entity;

use App\Repository\DemandecreditRepository;
use Doctrine\ORM\Mapping as ORM;

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
    private $mail;


    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $societe;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
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
     * @ORM\Column(type="string", length=255 , nullable=true)
     */
    private $secu_social;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $num_carte_identite;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
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
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $date_naissance;

    /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $pays_naissance;

    /**
     * @ORM\Column(type="string", length=255 ,nullable=true)
     */
    private $annee_belgique;

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

    public function getDateNaissance(): ?string
    {
        return $this->date_naissance;
    }

    public function setDateNaissance(string $date_naissance): self
    {
        $this->date_naissance = $date_naissance;

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

    public function getAnneeBelgique(): ?string
    {
        return $this->annee_belgique;
    }

    public function setAnneeBelgique(string $annee_belgique): self
    {
        $this->annee_belgique = $annee_belgique;

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
}
