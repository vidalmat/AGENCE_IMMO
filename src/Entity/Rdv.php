<?php

namespace App\Entity;

use App\Repository\RdvRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RdvRepository::class)
 */
class Rdv
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $motif;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="rdv")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="rdv")
     */
    private $Agent;

    public function __construct()
    {
        $this->user = new ArrayCollection();
        $this->Agent = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getMotif(): ?string
    {
        return $this->motif;
    }

    public function setMotif(string $motif): self
    {
        $this->motif = $motif;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(Client $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user[] = $user;
            $user->setRdv($this);
        }

        return $this;
    }

    public function removeUser(Client $user): self
    {
        if ($this->user->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRdv() === $this) {
                $user->setRdv(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Agent[]
     */
    public function getAgent(): Collection
    {
        return $this->Agent;
    }

    public function addAgent(Agent $agent): self
    {
        if (!$this->Agent->contains($agent)) {
            $this->Agent[] = $agent;
            $agent->setRdv($this);
        }

        return $this;
    }

    public function removeAgent(Agent $agent): self
    {
        if ($this->Agent->removeElement($agent)) {
            // set the owning side to null (unless already changed)
            if ($agent->getRdv() === $this) {
                $agent->setRdv(null);
            }
        }

        return $this;
    }
}
