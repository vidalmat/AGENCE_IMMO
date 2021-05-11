<?php

namespace App\Entity;

use App\Repository\AgentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=AgentRepository::class)
 */
class Agent
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(
     *      message = "Le champ doit être rempli")
     * @Assert\Regex(
     *    pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *    htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *    pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *    htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=20)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $tel;

    /**
     * @ORM\OneToOne(targetEntity=User::class, inversedBy="agent", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\OneToMany(targetEntity=Client::class, mappedBy="agent")
     */
    private $clients;

    /**
     * @ORM\ManyToOne(targetEntity=Calendrier::class, inversedBy="Agent")
     */
    private $calendrier;

    /**
     * @ORM\OneToMany(targetEntity=Calendrier::class, mappedBy="Agent")
     */
    private $calendriers;

    /**
     * @ORM\OneToOne(targetEntity=Biens::class, mappedBy="Agent", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $biens;

    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->calendriers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return Collection|Client[]
     */
    public function getClients(): Collection
    {
        return $this->clients;
    }

    public function addClient(Client $client): self
    {
        if (!$this->clients->contains($client)) {
            $this->clients[] = $client;
            $client->setAgent($this);
        }

        return $this;
    }

    public function removeClient(Client $client): self
    {
        if ($this->clients->removeElement($client)) {
            // set the owning side to null (unless already changed)
            if ($client->getAgent() === $this) {
                $client->setAgent(null);
            }
        }

        return $this;
    }

    public function getCalendrier(): ?Calendrier
    {
        return $this->calendrier;
    }

    public function setCalendrier(?Calendrier $calendrier): self
    {
        $this->calendrier = $calendrier;

        return $this;
    }

    /**
     * @return Collection|Calendrier[]
     */
    public function getCalendriers(): Collection
    {
        return $this->calendriers;
    }

    public function addCalendrier(Calendrier $calendrier): self
    {
        if (!$this->calendriers->contains($calendrier)) {
            $this->calendriers[] = $calendrier;
            $calendrier->setAgent($this);
        }

        return $this;
    }

    public function removeCalendrier(Calendrier $calendrier): self
    {
        if ($this->calendriers->removeElement($calendrier)) {
            // set the owning side to null (unless already changed)
            if ($calendrier->getAgent() === $this) {
                $calendrier->setAgent(null);
            }
        }

        return $this;
    }

    public function getBiens(): ?Biens
    {
        return $this->biens;
    }

    public function setBiens(?Biens $biens): self
    {
        // unset the owning side of the relation if necessary
        if ($biens === null && $this->biens !== null) {
            $this->biens->setAgent(null);
        }

        // set the owning side of the relation if necessary
        if ($biens !== null && $biens->getAgent() !== $this) {
            $biens->setAgent($this);
        }

        $this->biens = $biens;

        return $this;
    }
}
