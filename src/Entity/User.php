<?php

namespace App\Entity;

use App\Entity\Ville;
use App\Entity\MonAnnonce;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Prenom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Sexe;

    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="users")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Email;

    /**
     * @ORM\OneToMany(targetEntity=MonAnnonce::class, mappedBy="User")
     */
    private $monAnnonces;

    public function __construct()
    {
        $this->monAnnonces = new ArrayCollection();
    }

    public function __toString()
    {
        return $this->Nom;
    }
    
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->Prenom;
    }

    public function setPrenom(string $Prenom): self
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    public function getSexe(): ?string
    {
        return $this->Sexe;
    }

    public function setSexe(string $Sexe): self
    {
        $this->Sexe = $Sexe;

        return $this;
    }

    public function getVille(): ?Ville
    {
        return $this->Ville;
    }

    public function setVille(?Ville $Ville): self
    {
        $this->Ville = $Ville;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection|MonAnnonce[]
     */
    public function getMonAnnonces(): Collection
    {
        return $this->monAnnonces;
    }

    public function addMonAnnonce(MonAnnonce $monAnnonce): self
    {
        if (!$this->monAnnonces->contains($monAnnonce)) {
            $this->monAnnonces[] = $monAnnonce;
            $monAnnonce->setUser($this);
        }

        return $this;
    }

    public function removeMonAnnonce(MonAnnonce $monAnnonce): self
    {
        if ($this->monAnnonces->contains($monAnnonce)) {
            $this->monAnnonces->removeElement($monAnnonce);
            // set the owning side to null (unless already changed)
            if ($monAnnonce->getUser() === $this) {
                $monAnnonce->setUser(null);
            }
        }

        return $this;
    }
}
