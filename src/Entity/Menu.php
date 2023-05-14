<?php

namespace App\Entity;

use App\Repository\MenuRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

#[ORM\Entity(repositoryClass: MenuRepository::class)]
#[UniqueEntity('nom')]
class Menu
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(min:3, max:250)]
    private ?string $nom = null;

    #[ORM\OneToMany(mappedBy: 'menu', targetEntity: Formule::class)]
    private Collection $formules;

    public function __construct()
    {
        $this->formules = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Formule>
     */
    public function getFormules(): Collection
    {
        return $this->formules;
    }

    public function addFormule(Formule $formule): self
    {
        if (!$this->formules->contains($formule)) {
            $this->formules->add($formule);
            $formule->setMenu($this);
        }

        return $this;
    }

    public function removeFormule(Formule $formule): self
    {
        if ($this->formules->removeElement($formule)) {
            // set the owning side to null (unless already changed)
            if ($formule->getMenu() === $this) {
                $formule->setMenu(null);
            }
        }

        return $this;
    }
}
