<?php

namespace App\Entity;

use App\Repository\InfoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InfoRepository::class)
 */
class Info
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
    private $info_label;

        /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $info_string;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getInfoLabel(): ?string
    {
        return $this->info_label;
    }

    public function setInfoLabel(?string $info_label): self
    {
        $this->info_label = $info_label;

        return $this;
    }
    public function getInfoString(): ?string
    {
        return $this->info_string;
    }

    public function setInfoString(?string $info_string): self
    {
        $this->info_string = $info_string;

        return $this;
    }
}
