<?php

namespace App\Entity;

use App\Repository\CarotteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CarotteRepository::class)
 */
class Carotte
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
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="carottes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Categorie;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Image;

    /**
     * @ORM\OneToMany(targetEntity=Troc::class, mappedBy="CarotteATroquer")
     */
    private $trocs;

    public function __construct()
    {
        $this->trocs = new ArrayCollection();
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

    public function getCategorie(): ?Categorie
    {
        return $this->Categorie;
    }

    public function setCategorie(?Categorie $Categorie): self
    {
        $this->Categorie = $Categorie;

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

    /**
     * @return Collection|Troc[]
     */
    public function getTrocs(): Collection
    {
        return $this->trocs;
    }

    public function addTroc(Troc $troc): self
    {
        if (!$this->trocs->contains($troc)) {
            $this->trocs[] = $troc;
            $troc->setCarotteATroquer($this);
        }

        return $this;
    }

    public function removeTroc(Troc $troc): self
    {
        if ($this->trocs->contains($troc)) {
            $this->trocs->removeElement($troc);
            // set the owning side to null (unless already changed)
            if ($troc->getCarotteATroquer() === $this) {
                $troc->setCarotteATroquer(null);
            }
        }

        return $this;
    }
}
