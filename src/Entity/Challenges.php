<?php

namespace App\Entity;

use App\Repository\ChallengesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ChallengesRepository::class)
 */
class Challenges
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
    private $type;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $category;

    /**
     * @ORM\Column(type="integer")
     */
    private $points;

    /**
     * @ORM\OneToOne(targetEntity=Energydatas::class, inversedBy="challenges", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $datachallenge;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $niveau;

    /**
     * @ORM\ManyToOne(targetEntity=Logement::class, inversedBy="challenges")
     */
    private $logement;

    /**
     * @ORM\OneToMany(targetEntity=ChallengeUser::class, mappedBy="IdChallenge")
     */
    private $challengeUsers;

    public function __construct()
    {
        $this->challengeUsers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): self
    {
        $this->type = $type;

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

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getPoints(): ?int
    {
        return $this->points;
    }

    public function setPoints(int $points): self
    {
        $this->points = $points;

        return $this;
    }

    public function getDatachallenge(): ?Energydatas
    {
        return $this->datachallenge;
    }

    public function setDatachallenge(Energydatas $datachallenge): self
    {
        $this->datachallenge = $datachallenge;

        return $this;
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

    public function getLogement(): ?Logement
    {
        return $this->logement;
    }

    public function setLogement(?Logement $logement): self
    {
        $this->logement = $logement;

        return $this;
    }

    /**
     * @return Collection|ChallengeUser[]
     */
    public function getChallengeUsers(): Collection
    {
        return $this->challengeUsers;
    }

    public function addChallengeUser(ChallengeUser $challengeUser): self
    {
        if (!$this->challengeUsers->contains($challengeUser)) {
            $this->challengeUsers[] = $challengeUser;
            $challengeUser->setIdChallenge($this);
        }

        return $this;
    }

    public function removeChallengeUser(ChallengeUser $challengeUser): self
    {
        if ($this->challengeUsers->removeElement($challengeUser)) {
            // set the owning side to null (unless already changed)
            if ($challengeUser->getIdChallenge() === $this) {
                $challengeUser->setIdChallenge(null);
            }
        }

        return $this;
    }
}
