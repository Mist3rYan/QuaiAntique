<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
    #[Assert\Length(min: 3, max: 250)]
    private ?string $visiteur_name = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min: 3, max: 250)]
    private ?string $visiteur_email = null;

    #[ORM\Column]
    #[Assert\Positive(message: 'Le nombre de convive doit être supérieur à 0.')]
    private ?int $visiteur_nb_convive = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'La date ne peut pas être vide.')]
    private ?\DateTime $date = null;

    #[ORM\Column]
    #[Assert\NotNull(message: 'L\'heure ne peut pas être vide.')]
    private ?\DateTime $heure = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToMany(targetEntity: Allergene::class, inversedBy: 'reservations')]
    private Collection $allergenes;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->allergenes = new ArrayCollection();
    }

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

    public function getDate(): ?\DateTime
    {
        return $this->date;
    }

    public function setDate(\DateTime $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getHeure(): ?\DateTime
    {
        return $this->heure;
    }

    public function setHeure(\DateTime $heure): self
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

    /**
     * @return Collection<int, Allergene>
     */
    public function getAllergenes(): Collection
    {
        return $this->allergenes;
    }

    public function addAllergene(Allergene $allergene): self
    {
        if (!$this->allergenes->contains($allergene)) {
            $this->allergenes->add($allergene);
        }

        return $this;
    }

    public function removeAllergene(Allergene $allergene): self
    {
        $this->allergenes->removeElement($allergene);

        return $this;
    }

}
