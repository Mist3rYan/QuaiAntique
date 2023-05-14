<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $visiteur_name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $visiteur_email = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Le nombre de convive doit être supérieur à 0.')]
    private ?int $visiteur_nb_convive = null;

    #[ORM\Column(type: Types::JSON)]
    private array $visiteur_allergene = [];

    #[ORM\Column(type: Types::DATE_IMMUTABLE)]
    #[Assert\NotNull(message: 'La date ne peut pas être vide.')]
    private ?\DateTimeImmutable $date = null;

    #[ORM\Column]
    private ?float $heure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVisiteurName(): ?string
    {
        return $this->visiteur_name;
    }

    public function setVisiteurName(string $visiteur_name): self
    {
        $this->visiteur_name = $visiteur_name;

        return $this;
    }

    public function getVisiteurEmail(): ?string
    {
        return $this->visiteur_email;
    }

    public function setVisiteurEmail(string $visiteur_email): self
    {
        $this->visiteur_email = $visiteur_email;

        return $this;
    }

    public function getVisiteurNbConvive(): ?int
    {
        return $this->visiteur_nb_convive;
    }

    public function setVisiteurNbConvive(int $visiteur_nb_convive): self
    {
        $this->visiteur_nb_convive = $visiteur_nb_convive;

        return $this;
    }

    public function getVisiteurAllergene(): array
    {
        return $this->visiteur_allergene;
    }

    public function setVisiteurAllergene(array $visiteur_allergene): self
    {
        $this->visiteur_allergene = $visiteur_allergene;

        return $this;
    }

    public function getDate(): ?\DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(\DateTimeImmutable $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?float
    {
        return $this->heure;
    }

    public function setHeure(float $heure): self
    {
        $this->heure = $heure;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

}
