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

    // /**
    //  * @ORM\Column(type="datetime")
    //  */
    // private $date;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $motif;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="rdv")
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Agent::class, mappedBy="rdv")
     */
    private $Agent;

    // /**
    //  * @ORM\Column(type="string", length=100)
    //  */
    // private $titre;

    // /**
    //  * @ORM\Column(type="datetime")
    //  */
    // private $debut;

    // /**
    //  * @ORM\Column(type="datetime")
    //  */
    // private $fin;

    // /**
    //  * @ORM\Column(type="string", length=7)
    //  */
    // private $fond;

    // /**
    //  * @ORM\Column(type="string", length=7)
    //  */
    // private $bordure;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $couleur_texte;

    // public function __construct()
    // {
    //     $this->user = new ArrayCollection();
    //     $this->Agent = new ArrayCollection();
    // }

    // public function getId(): ?int
    // {
    //     return $this->id;
    // }

    // public function getDate(): ?\DateTimeInterface
    // {
    //     return $this->date;
    // }

    // public function setDate(\DateTimeInterface $date): self
    // {
    //     $this->date = $date;

    //     return $this;
    // }

    // public function getMotif(): ?string
    // {
    //     return $this->motif;
    // }

    // public function setMotif(string $motif): self
    // {
    //     $this->motif = $motif;

    //     return $this;
    // }

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

//     public function getTitre(): ?string
//     {
//         return $this->titre;
//     }

//     public function setTitre(string $titre): self
//     {
//         $this->titre = $titre;

//         return $this;
//     }

//     public function getDebut(): ?\DateTimeInterface
//     {
//         return $this->debut;
//     }

//     public function setDebut(\DateTimeInterface $debut): self
//     {
//         $this->debut = $debut;

//         return $this;
//     }

//     public function getFin(): ?\DateTimeInterface
//     {
//         return $this->fin;
//     }

//     public function setFin(\DateTimeInterface $fin): self
//     {
//         $this->fin = $fin;

//         return $this;
//     }

//     public function getFond(): ?string
//     {
//         return $this->fond;
//     }

//     public function setFond(string $fond): self
//     {
//         $this->fond = $fond;

//         return $this;
//     }

//     public function getBordure(): ?string
//     {
//         return $this->bordure;
//     }

//     public function setBordure(string $bordure): self
//     {
//         $this->bordure = $bordure;

//         return $this;
//     }

//     public function getCouleurTexte(): ?string
//     {
//         return $this->couleur_texte;
//     }

//     public function setCouleurTexte(string $couleur_texte): self
//     {
//         $this->couleur_texte = $couleur_texte;

//         return $this;
//     }
}
