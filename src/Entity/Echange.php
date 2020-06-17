<?php

namespace App\Entity;

use App\Repository\EchangeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EchangeRepository::class)
 */
class Echange
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
    private $maCarotte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantiteMaCarotte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $bio;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $contreCarotte;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $quantiteContreCarotte;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMaCarotte(): ?string
    {
        return $this->maCarotte;
    }

    public function setMaCarotte(string $maCarotte): self
    {
        $this->maCarotte = $maCarotte;

        return $this;
    }

    public function getQuantiteMaCarotte(): ?float
    {
        return $this->quantiteMaCarotte;
    }

    public function setQuantiteMaCarotte(?float $quantiteMaCarotte): self
    {
        $this->quantiteMaCarotte = $quantiteMaCarotte;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(?string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getContreCarotte(): ?string
    {
        return $this->contreCarotte;
    }

    public function setContreCarotte(?string $contreCarotte): self
    {
        $this->contreCarotte = $contreCarotte;

        return $this;
    }

    public function getQuantiteContreCarotte(): ?float
    {
        return $this->quantiteContreCarotte;
    }

    public function setQuantiteContreCarotte(?float $quantiteContreCarotte): self
    {
        $this->quantiteContreCarotte = $quantiteContreCarotte;

        return $this;
    }

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(?string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }
}
