<?php

namespace App\Entity;

use App\Repository\ClientRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=ClientRepository::class)
 */
class Client
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $prenom;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $adresse;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     * )
     */
    private $tel;

    /**
     * @ORM\OneToOne(targetEntity=User::class, cascade={"persist", "remove"})
     * @Assert\NotBlank
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity=Agent::class, inversedBy="clients")
     */
    private $agent;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     *  )
     */
    private $ville;

    /**
     * @ORM\Column(type="string", length=180)
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank(
     *     message = "Le champ doit être rempli")
     * @Assert\Length(
     *     min = 5,
     *     max = 5,
     *     minMessage = "Vous n'avez pas rentré le nombre suffisant",
     *     maxMessage = "Vous n'avez pas rentré le nombre suffisant"
     * ),
     * @Assert\Regex(
     *     pattern = "/^[\w\s\dáàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+$/i",
     *     htmlPattern  = "[\w\s\áàâäãéèêëíìîïóòôöõúùûüýÿÁÀÂÄÃÉÈÊËÍÌÎÏÓÒÔÖÕÚÙÛÜÝ\'\-]+"
     *  )
     */
    private $cp;

    /**
     * @ORM\OneToMany(targetEntity=Calendrier::class, mappedBy="Client")
     */
    private $calendriers;

    public function __construct()
    {
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

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

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

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getAgent(): ?Agent
    {
        return $this->agent;
    }

    public function setAgent(?Agent $agent): self
    {
        $this->agent = $agent;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getCp(): ?string
    {
        return $this->cp;
    }

    public function setCp(string $cp): self
    {
        $this->cp = $cp;

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
            $calendrier->setClient($this);
        }

        return $this;
    }

    public function removeCalendrier(Calendrier $calendrier): self
    {
        if ($this->calendriers->removeElement($calendrier)) {
            // set the owning side to null (unless already changed)
            if ($calendrier->getClient() === $this) {
                $calendrier->setClient(null);
            }
        }

        return $this;
    }

    public function setData(Array $array): self
    {
        $this->setNom($array['nom']);
        $this->setPrenom($array['prenom']);
        $this->setAdresse($array['adresse']);
        $this->setVille($array['ville']);
        $this->setCp($array['cp']);
        $this->setTel($array['tel']);
        return $this;
    }
}
