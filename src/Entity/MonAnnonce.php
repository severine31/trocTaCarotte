<?php

namespace App\Entity;

use App\Repository\MonAnnonceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=MonAnnonceRepository::class)
 */
class MonAnnonce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="monAnnonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $User;

    /**
     * @ORM\Column(type="datetime",nullable=true)
     */
    private $Date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Description;

    /**
     * @ORM\Column(type="object", nullable=true)
     */
    private $Photo;

    /**
     * @ORM\ManyToOne(targetEntity=Statut::class, inversedBy="monAnnonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Statut;

    /**
     * @Assert\PositiveOrZero, message="Veuillez indiquer une quantité"
     * @ORM\Column(type="integer", nullable=false)
     */
    private $Quantity;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ContreQuantite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Bio;

    /**
     * @Assert\NotBlank, message="Veuillez indiquer une unité"
     * @ORM\Column(type="string", length=255)
     */
    private $Unite;

    /**
     * @Assert\NotBlank, message="Veuillez indiquer une unité"
     * @ORM\Column(type="string", length=255)
     */
    private $ContreUnite;

    /**
     * @Assert\NotBlank, message="Veuillez indiquer ce que que vous souhaitez troquer"
     * @ORM\ManyToOne(targetEntity=Carotte::class, inversedBy="monAnnonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CarotteATroquer;

    /**
     * @Assert\NotBlank
     * @ORM\ManyToOne(targetEntity=Carotte::class, inversedBy="monAnnonces")
     * @ORM\JoinColumn(nullable=true)
     */
    private $ContreCarotte;

    /**
     * @Assert\NotBlank, message="Veuillez indiquer votre ville"
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="monAnnonces")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Ville;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ContreBio;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->User;
    }

    public function setUser(?User $User): self
    {
        $this->User = $User;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): self
    {
        $this->Date = $Date;

        return $this;
    }


    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(?string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPhoto()
    {
        return $this->Photo;
    }

    public function setPhoto($Photo): self
    {
        $this->Photo = $Photo;

        return $this;
    }

    public function getStatut(): ?Statut
    {
        return $this->Statut;
    }

    public function setStatut(?Statut $Statut): self
    {
        $this->Statut = $Statut;

        return $this;
    }

    public function getQuantity(): ?int
    {
        return $this->Quantity;
    }

    public function setQuantity(?int $Quantity): self
    {
        $this->Quantity = $Quantity;

        return $this;
    }

    public function getContreQuantite(): ?int
    {
        return $this->ContreQuantite;
    }

    public function setContreQuantite(?int $ContreQuantite): self
    {
        $this->ContreQuantite = $ContreQuantite;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->Bio;
    }

    public function setBio(?string $Bio): self
    {
        $this->Bio = $Bio;

        return $this;
    }

    public function getUnite(): ?string
    {
        return $this->Unite;
    }

    public function setUnite(string $Unite): self
    {
        $this->Unite = $Unite;

        return $this;
    }

    public function getContreUnite(): ?string
    {
        return $this->ContreUnite;
    }

    public function setContreUnite(string $ContreUnite): self
    {
        $this->ContreUnite = $ContreUnite;

        return $this;
    }

    public function getCarotteATroquer(): ?Carotte
    {
        return $this->CarotteATroquer;
    }

    public function setCarotteATroquer(?Carotte $CarotteATroquer): self
    {
        $this->CarotteATroquer = $CarotteATroquer;

        return $this;
    }

    public function getContreCarotte(): ?Carotte
    {
        return $this->ContreCarotte;
    }

    public function setContreCarotte(?Carotte $ContreCarotte): self
    {
        $this->ContreCarotte = $ContreCarotte;

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

    public function getContreBio(): ?string
    {
        return $this->ContreBio;
    }

    public function setContreBio(?string $ContreBio): self
    {
        $this->ContreBio = $ContreBio;

        return $this;
    }
}
