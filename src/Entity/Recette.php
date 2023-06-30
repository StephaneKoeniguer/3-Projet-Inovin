<?php

namespace App\Entity;

use App\Repository\RecetteRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RecetteRepository::class)]
class Recette
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?Vin $vin1 = null;

    #[ORM\Column]
    private ?int $quantite = null;

    #[ORM\Column]
    private ?int $quantite2 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes3')]
    private ?Vin $vin3 = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite3 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes4')]
    private ?Vin $vin4 = null;

    #[ORM\Column(nullable: true)]
    private ?int $quantite4 = null;

    #[ORM\ManyToOne(inversedBy: 'recettes')]
    private ?User $user = null;

    #[ORM\ManyToOne(inversedBy: 'recettes2')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Vin $vin2 = null;

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

    public function getQuantite(): ?int
    {
        return $this->quantite;
    }

    public function setQuantite(int $quantite): self
    {
        $this->quantite = $quantite;

        return $this;
    }

    public function getVin1(): ?Vin
    {
        return $this->vin1;
    }

    public function setVin1(?Vin $vin1): self
    {
        $this->vin1 = $vin1;

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

    public function getQuantite2(): ?int
    {
        return $this->quantite2;
    }

    public function setQuantite2(int $quantite2): static
    {
        $this->quantite2 = $quantite2;

        return $this;
    }

    public function getVin3(): ?Vin
    {
        return $this->vin3;
    }

    public function setVin3(?Vin $vin3): static
    {
        $this->vin3 = $vin3;

        return $this;
    }

    public function getQuantite3(): ?int
    {
        return $this->quantite3;
    }

    public function setQuantite3(?int $quantite3): static
    {
        $this->quantite3 = $quantite3;

        return $this;
    }

    public function getVin4(): ?Vin
    {
        return $this->vin4;
    }

    public function setVin4(?Vin $vin4): static
    {
        $this->vin4 = $vin4;

        return $this;
    }

    public function getQuantite4(): ?int
    {
        return $this->quantite4;
    }

    public function setQuantite4(?int $quantite4): static
    {
        $this->quantite4 = $quantite4;

        return $this;
    }

    public function getVin2(): ?Vin
    {
        return $this->vin2;
    }

    public function setVin2(?Vin $vin2): static
    {
        $this->vin2 = $vin2;

        return $this;
    }
}
