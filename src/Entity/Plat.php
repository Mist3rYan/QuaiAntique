<?php

namespace App\Entity;

use App\Repository\PlatRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: PlatRepository::class)]
class Plat
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotNull(message: 'La description ne peut pas être vide.')]
    private ?string $description = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Le prix doit être supérieur à 0.')]
    private ?float $prix = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $file_image = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $title_image = null;

    #[ORM\Column]
    private ?bool $is_favorite = null;

    #[ORM\ManyToOne(inversedBy: 'plats')]
    private ?Categorie $categorie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getFileImage(): ?string
    {
        return $this->file_image;
    }

    public function setFileImage(string $file_image): self
    {
        $this->file_image = $file_image;

        return $this;
    }

    public function getTitleImage(): ?string
    {
        return $this->title_image;
    }

    public function setTitleImage(string $title_image): self
    {
        $this->title_image = $title_image;

        return $this;
    }

    public function isIsFavorite(): ?bool
    {
        return $this->is_favorite;
    }

    public function setIsFavorite(bool $is_favorite): self
    {
        $this->is_favorite = $is_favorite;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }
}
