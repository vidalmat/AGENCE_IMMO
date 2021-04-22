<?php

namespace App\Entity;

use App\Repository\CalendrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CalendrierRepository::class)
 */
class Calendrier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $debut;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fin;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $journee;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $couleur_fond;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $couleur_bordure;

    /**
     * @ORM\Column(type="string", length=7)
     */
    private $couleur_texte;

    /**
     * @ORM\ManyToOne(targetEntity=Client::class, inversedBy="calendriers")
     */
    private $Client;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="calendriers")
     */
    private $Agent;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDebut(): ?\DateTimeInterface
    {
        return $this->debut;
    }

    public function setDebut(\DateTimeInterface $debut): self
    {
        $this->debut = $debut;

        return $this;
    }

    public function getFin(): ?\DateTimeInterface
    {
        return $this->fin;
    }

    public function setFin(\DateTimeInterface $fin): self
    {
        $this->fin = $fin;

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

    public function getJournee(): ?bool
    {
        return $this->journee;
    }

    public function setJournee(bool $journee): self
    {
        $this->journee = $journee;

        return $this;
    }

    public function getCouleurFond(): ?string
    {
        return $this->couleur_fond;
    }

    public function setCouleurFond(string $couleur_fond): self
    {
        $this->couleur_fond = $couleur_fond;

        return $this;
    }

    public function getCouleurBordure(): ?string
    {
        return $this->couleur_bordure;
    }

    public function setCouleurBordure(string $couleur_bordure): self
    {
        $this->couleur_bordure = $couleur_bordure;

        return $this;
    }

    public function getCouleurTexte(): ?string
    {
        return $this->couleur_texte;
    }

    public function setCouleurTexte(string $couleur_texte): self
    {
        $this->couleur_texte = $couleur_texte;

        return $this;
    }

    public function getClient(): ?Client
    {
        return $this->Client;
    }

    public function setClient(?Client $Client): self
    {
        $this->Client = $Client;

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->Agent;
    }

    public function setAgent(?Agent $Agent): self
    {
        $this->Agent = $Agent;

        return $this;
    }

}
