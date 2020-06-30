<?php

namespace App\Entity;

use App\Repository\TrocRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=TrocRepository::class)
 */
class Troc
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Carotte::class, inversedBy="trocs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $CarotteATroquer;

    /**
     * @ORM\ManyToOne(targetEntity=Carotte::class, inversedBy="trocs")
     */
    private $ContreCarotte;

    /**
     * @ORM\Column(type="integer", nullable=true)
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
     * @ORM\Column(type="string", length=255)
     */
    private $Unite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ContreUnite;

    public function __toString()
    {
        return $this->id;
    }

    public function getId(): ?int
    {
        return $this->id;
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
}
