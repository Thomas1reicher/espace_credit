<?php

namespace App\Entity;

use App\Repository\PersonneChargeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PersonneChargeRepository::class)
 */
class PersonneCharge
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $enfant;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $age;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnfant(): ?bool
    {
        return $this->enfant;
    }

    public function setEnfant(?bool $enfant): self
    {
        $this->enfant = $enfant;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(?int $age): self
    {
        $this->age = $age;

        return $this;
    }
}
