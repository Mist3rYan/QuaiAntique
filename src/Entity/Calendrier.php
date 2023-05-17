<?php

namespace App\Entity;

use App\Repository\CalendrierRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CalendrierRepository::class)]
class Calendrier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $jour = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $o_midi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $f_midi = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $o_soir = null;

    #[ORM\Column(type: Types::TIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $f_soir = null;

    #[ORM\Column]
    private ?bool $is_open = null;

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

    public function getOMidi(): ?\DateTimeInterface
    {
        return $this->o_midi;
    }

    public function setOMidi(?\DateTimeInterface $o_midi): self
    {
        $this->o_midi = $o_midi;

        return $this;
    }

    public function getFMidi(): ?\DateTimeInterface
    {
        return $this->f_midi;
    }

    public function setFMidi(?\DateTimeInterface $f_midi): self
    {
        $this->f_midi = $f_midi;

        return $this;
    }

    public function getOSoir(): ?\DateTimeInterface
    {
        return $this->o_soir;
    }

    public function setOSoir(?\DateTimeInterface $o_soir): self
    {
        $this->o_soir = $o_soir;

        return $this;
    }

    public function getFSoir(): ?\DateTimeInterface
    {
        return $this->f_soir;
    }

    public function setFSoir(?\DateTimeInterface $f_soir): self
    {
        $this->f_soir = $f_soir;

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
}
