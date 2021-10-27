<?php

namespace App\Entity;

use App\Repository\CreditRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;
       /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $description;
       /**
     * @ORM\Column(type="string", length=255,nullable=true)
     */
    private $img;

    /**
     * @ORM\OneToMany(targetEntity=Taux::class, mappedBy="credit",cascade={"persist"})
     */
    private $taux;

    /**
     * @ORM\OneToMany(targetEntity="Demandecredit", mappedBy="type_credit_demande")
     */
    private $credit;





   
    
    public function __construct()
    {
        $this->credit = new ArrayCollection();
        $this->taux = new ArrayCollection();

    }
    public function getCredit(): ArrayCollection
    {
        return $this->credit;
    }

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
    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->nom = $slug;

        return $this;
    }
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): self
    {
        $this->img = $img;

        return $this;
    }

    public function vars() :array
    {
        $tbl = [];
        $tbl[0]="nom";
        $tbl[1]="img";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];

        $tbl[0]="String";
        $tbl[1]="file";

        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        $tbl[0]=$this->getNom();
        $tbl[1]=$this->getImg();
        return $tbl;


    }
    public function __toString()
    {
        // TODO: Implement __toString() method.

        $tbl="";
        $tbl.=$this->getNom();
        $tbl.=$this->getDescription();
        $tbl.=$this->getImg();
        return $tbl;
    }

    /**
     * @return Collection|Test[]
     */
    public function getTaux(): Collection
    {
        return $this->taux;
    }

    public function addTest(Taux $taux): self
    {
        if (!$this->taux->contains($taux)) {
            $this->taux[] = $taux;
            $taux->setTaux($this);
        }

        return $this;
    }

    public function removeTaux(Taux $taux): self
    {
        if ($this->tests->removeElement($taux)) {
            // set the owning side to null (unless already changed)
            if ($taux->getTaux() === $this) {
                $taux->setTaux(null);
            }
        }

        return $this;
    }

    public function addTaux(Taux $taux): self
    {
        if (!$this->taux->contains($taux)) {
            $this->taux[] = $taux;
            $taux->setCredit($this);
        }

        return $this;
    }

    public function addCredit(Demandecredit $credit): self
    {
        if (!$this->credit->contains($credit)) {
            $this->credit[] = $credit;
            $credit->setTypeCreditDemande($this);
        }

        return $this;
    }

    public function removeCredit(Demandecredit $credit): self
    {
        if ($this->credit->removeElement($credit)) {
            // set the owning side to null (unless already changed)
            if ($credit->getTypeCreditDemande() === $this) {
                $credit->setTypeCreditDemande(null);
            }
        }

        return $this;
    }


}
