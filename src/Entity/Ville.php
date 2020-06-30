<?php

namespace App\Entity;

use App\Repository\VilleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VilleRepository::class)
 */
class Ville
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
     * @ORM\Column(type="integer")
     */
    private $CP;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="Ville")
     */
    private $users;

    /**
     * @ORM\OneToMany(targetEntity=MonAnnonce::class, mappedBy="Ville")
     */
    private $monAnnonces;

    public function __construct()
    {
        $this->monAnnonces = new ArrayCollection();
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

    public function getCP(): ?int
    {
        return $this->CP;
    }

    public function setCP(int $CP): self
    {
        $this->CP = $CP;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setVille($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->contains($user)) {
            $this->users->removeElement($user);
            // set the owning side to null (unless already changed)
            if ($user->getVille() === $this) {
                $user->setVille(null);
            }
        }

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
            $monAnnonce->setVille($this);
        }

        return $this;
    }

    public function removeMonAnnonce(MonAnnonce $monAnnonce): self
    {
        if ($this->monAnnonces->contains($monAnnonce)) {
            $this->monAnnonces->removeElement($monAnnonce);
            // set the owning side to null (unless already changed)
            if ($monAnnonce->getVille() === $this) {
                $monAnnonce->setVille(null);
            }
        }

        return $this;
    }
}
