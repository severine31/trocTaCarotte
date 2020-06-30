<?php

namespace App\Entity;

use App\Repository\CategorieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategorieRepository::class)
 */
class Categorie
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
     * @ORM\OneToMany(targetEntity=Carotte::class, mappedBy="Categorie")
     */
    private $carottes;

    public function __construct()
    {
        $this->carottes = new ArrayCollection();
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
     * @return Collection|Carotte[]
     */
    public function getCarottes(): Collection
    {
        return $this->carottes;
    }

    public function addCarotte(Carotte $carotte): self
    {
        if (!$this->carottes->contains($carotte)) {
            $this->carottes[] = $carotte;
            $carotte->setCategorie($this);
        }

        return $this;
    }

    public function removeCarotte(Carotte $carotte): self
    {
        if ($this->carottes->contains($carotte)) {
            $this->carottes->removeElement($carotte);
            // set the owning side to null (unless already changed)
            if ($carotte->getCategorie() === $this) {
                $carotte->setCategorie(null);
            }
        }

        return $this;
    }
}
