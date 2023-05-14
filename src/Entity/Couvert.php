<?php

namespace App\Entity;

use App\Repository\CouvertRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CouvertRepository::class)]
class Couvert
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $nb_couvert = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNbCouvert(): ?int
    {
        return $this->nb_couvert;
    }

    public function setNbCouvert(int $nb_couvert): self
    {
        $this->nb_couvert = $nb_couvert;

        return $this;
    }
}
