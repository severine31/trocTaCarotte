<?php

namespace App\Entity;

use App\Repository\StatutRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=StatutRepository::class)
 */
class Statut
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
     * @ORM\OneToMany(targetEntity=MonAnnonce::class, mappedBy="Statut")
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
            $monAnnonce->setStatut($this);
        }

        return $this;
    }

    public function removeMonAnnonce(MonAnnonce $monAnnonce): self
    {
        if ($this->monAnnonces->contains($monAnnonce)) {
            $this->monAnnonces->removeElement($monAnnonce);
            // set the owning side to null (unless already changed)
            if ($monAnnonce->getStatut() === $this) {
                $monAnnonce->setStatut(null);
            }
        }

        return $this;
    }
}
