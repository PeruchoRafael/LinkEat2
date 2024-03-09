<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PanierRepository::class)]
class Panier
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'paniers')]
    private ?Restaurateur $restaurateur = null;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?order $command = null;

    #[ORM\OneToMany(targetEntity: PanierItem::class, mappedBy: 'panier', cascade: ['persist', 'remove'])]
    private Collection $panierItems;

    public function __construct()
    {
        $this->panierItems = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRestaurateur(): ?Restaurateur
    {
        return $this->restaurateur;
    }

    public function setRestaurateur(?Restaurateur $restaurateur): static
    {
        $this->restaurateur = $restaurateur;

        return $this;
    }

    public function getCommand(): ?order
    {
        return $this->command;
    }

    public function setCommand(?order $command): static
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return Collection<int, PanierItem>
     */
    public function getPanierItems(): Collection
    {
        return $this->panierItems;
    }

    public function addPanierItem(PanierItem $panierItem): static
    {
        if (!$this->panierItems->contains($panierItem)) {
            $this->panierItems->add($panierItem);
            $panierItem->setPanier($this);
        }

        return $this;
    }

    public function removePanierItem(PanierItem $panierItem): static
    {
        if ($this->panierItems->removeElement($panierItem)) {
            // set the owning side to null (unless already changed)
            if ($panierItem->getPanier() === $this) {
                $panierItem->setPanier(null);
            }
        }

        return $this;
    }
}
