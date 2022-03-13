<?php

namespace App\Entity;

use App\Repository\EnergydatasRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EnergydatasRepository::class)
 */
class Energydatas
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
    private $category;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $comportement;

    /**
     * @ORM\Column(type="integer")
     */
    private $ratio;

    /**
     * @ORM\Column(type="float")
     */
    private $gain;

    /**
     * @ORM\OneToOne(targetEntity=Challenges::class, mappedBy="datachallenge", cascade={"persist", "remove"})
     */
    private $challenges;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getComportement(): ?string
    {
        return $this->comportement;
    }

    public function setComportement(string $comportement): self
    {
        $this->comportement = $comportement;

        return $this;
    }

    public function getRatio(): ?int
    {
        return $this->ratio;
    }

    public function setRatio(int $ratio): self
    {
        $this->ratio = $ratio;

        return $this;
    }

    public function getGain(): ?int
    {
        return $this->gain;
    }

    public function setGain(int $gain): self
    {
        $this->gain = $gain;

        return $this;
    }

    public function getChallenges(): ?Challenges
    {
        return $this->challenges;
    }

    public function setChallenges(Challenges $challenges): self
    {
        // set the owning side of the relation if necessary
        if ($challenges->getDatachallenge() !== $this) {
            $challenges->setDatachallenge($this);
        }

        $this->challenges = $challenges;

        return $this;
    }
}
