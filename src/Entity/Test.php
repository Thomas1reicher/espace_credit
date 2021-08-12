<?php

namespace App\Entity;

use App\Repository\TestRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TestRepository::class)
 */
class Test
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
    private $ent;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnt(): ?int
    {
        return $this->ent;
    }

    public function setEnt(int $ent): self
    {
        $this->ent = $ent;

        return $this;
    }
    public function vars() :array
    {
        $tbl = [];
        $tbl[1]="full name";
        $tbl[2]="password";
        $tbl[3]="username";
        return $tbl;


    }
    public function typeVars() :array
    {
        $tbl = [];
        $tbl[0]="email";
        $tbl[1]="string";
        $tbl[2]="password";
        $tbl[3]="string";
        return $tbl;


    }
    public function val() :array
    {
        $tbl = [];
        return $tbl;


    }


}
