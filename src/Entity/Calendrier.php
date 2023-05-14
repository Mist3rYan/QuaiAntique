<?php

namespace App\Entity;

use App\Repository\CalendrierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert; // Ajouté pour la validation des données
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity; // Ajouté pour la validation des données

#[ORM\Entity(repositoryClass: CalendrierRepository::class)]
#[UniqueEntity('jour')]
class Calendrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $jour = null;

    #[ORM\Column]
    private ?float $ouverture_midi = null;

    #[ORM\Column]
    private ?float $fermeture_midi = null;

    #[ORM\Column]
    private ?float $ouverture_soir = null;

    #[ORM\Column]
    private ?float $fermeture_soir = null;

    #[ORM\Column]
    private ?bool $is_open = null;

    #[ORM\OneToMany(mappedBy: 'calendrier', targetEntity: Reservation::class)]
    private Collection $reservations;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getJour(): ?string
    {
        return $this->jour;
    }

    public function setJour(string $jour): self
    {
        $this->jour = $jour;

        return $this;
    }

    public function getOuvertureMidi(): ?float
    {
        return $this->ouverture_midi;
    }

    public function setOuvertureMidi(float $ouverture_midi): self
    {
        $this->ouverture_midi = $ouverture_midi;

        return $this;
    }

    public function getFermetureMidi(): ?float
    {
        return $this->fermeture_midi;
    }

    public function setFermetureMidi(float $fermeture_midi): self
    {
        $this->fermeture_midi = $fermeture_midi;

        return $this;
    }

    public function getOuvertureSoir(): ?float
    {
        return $this->ouverture_soir;
    }

    public function setOuvertureSoir(float $ouverture_soir): self
    {
        $this->ouverture_soir = $ouverture_soir;

        return $this;
    }

    public function getFermetureSoir(): ?float
    {
        return $this->fermeture_soir;
    }

    public function setFermetureSoir(float $fermeture_soir): self
    {
        $this->fermeture_soir = $fermeture_soir;

        return $this;
    }

    public function isIsOpen(): ?bool
    {
        return $this->is_open;
    }

    public function setIsOpen(bool $is_open): self
    {
        $this->is_open = $is_open;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }
}
