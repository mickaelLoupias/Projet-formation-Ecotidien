<?php

namespace App\Entity;

use App\Repository\LevelRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LevelRepository::class)
 */
class Level
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
    private $niveau;

    /**
     * @ORM\Column(type="integer")
     */
    private $seuilpoint;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cup;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): self
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getSeuilpoint(): ?int
    {
        return $this->seuilpoint;
    }

    public function setSeuilpoint(int $seuilpoint): self
    {
        $this->seuilpoint = $seuilpoint;

        return $this;
    }

    public function getCup(): ?string
    {
        return $this->cup;
    }

    public function setCup(string $cup): self
    {
        $this->cup = $cup;

        return $this;
    }
}
