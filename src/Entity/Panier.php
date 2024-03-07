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

    #[ORM\ManyToMany(targetEntity: Product::class, inversedBy: 'paniers')]
    private Collection $product;

    #[ORM\OneToOne(cascade: ['persist', 'remove'])]
    private ?order $command = null;

    public function __construct()
    {
        $this->product = new ArrayCollection();
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

    /**
     * @return Collection<int, Product>
     */
    public function getProduct(): Collection
    {
        return $this->product;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->product->contains($product)) {
            $this->product->add($product);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        $this->product->removeElement($product);

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
}
