<?php

namespace App\Entity;

use App\Repository\ChallengeUserRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengeUserRepository::class)
 */
class ChallengeUser
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="challengeUsers")
     */
    private $IdUser;

    /**
     * @ORM\ManyToOne(targetEntity=Challenges::class, inversedBy="challengeUsers")
     */
    private $IdChallenge;

    /**
     * @ORM\Column(type="boolean")
     */
    private $Processus;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?User
    {
        return $this->IdUser;
    }

    public function setIdUser(?User $IdUser): self
    {
        $this->IdUser = $IdUser;

        return $this;
    }

    public function getIdChallenge(): ?Challenges
    {
        return $this->IdChallenge;
    }

    public function setIdChallenge(?Challenges $IdChallenge): self
    {
        $this->IdChallenge = $IdChallenge;

        return $this;
    }

    public function getProcessus(): ?bool
    {
        return $this->Processus;
    }

    public function setProcessus(bool $Processus): self
    {
        $this->Processus = $Processus;

        return $this;
    }
}
