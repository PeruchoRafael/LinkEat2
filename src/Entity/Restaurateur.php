<?php

namespace App\Entity;

use App\Repository\RestaurateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;

#[ORM\Entity(repositoryClass: RestaurateurRepository::class)]
class Restaurateur extends User
{
    #[ORM\Column(length: 255)]
    private ?int $phone = null;

    #[ORM\Column(length: 255)]
    private ?string $location = null;

    #[ORM\OneToMany(mappedBy: 'restaurateur', targetEntity: Order::class)]
    private Collection $orders;

    #[ORM\OneToMany(targetEntity: Panier::class, mappedBy: 'restaurateur')]
    private Collection $paniers;

    public function __construct()
{
    parent::__construct(); // Ajoutez cette ligne pour appeler le constructeur de User
    $this->orders = new ArrayCollection();
    $this->paniers = new ArrayCollection();
}
    
    public function getPhone(): ?int
    {
        return $this->phone;
    }

    public function setPhone(int $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): static
    {
        $this->location = $location;

        return $this;
    }

    public function getRoles(): array
    {
        return ['ROLE_RESTAURATEUR'];
    }

    /**
     * @return Collection<int, Order>
     */
    public function getOrders(): Collection
    {
        return $this->orders;
    }

    public function addOrder(Order $order): static
    {
        if (!$this->orders->contains($order)) {
            $this->orders->add($order);
            $order->setRestaurateur($this);
        }

        return $this;
    }

    public function removeOrder(Order $order): static
    {
        if ($this->orders->removeElement($order)) {
            // set the owning side to null (unless already changed)
            if ($order->getRestaurateur() === $this) {
                $order->setRestaurateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Panier>
     */
    public function getPaniers(): Collection
    {
        return $this->paniers;
    }

    public function addPanier(Panier $panier): static
    {
        if (!$this->paniers->contains($panier)) {
            $this->paniers->add($panier);
            $panier->setRestaurateur($this);
        }

        return $this;
    }

    public function removePanier(Panier $panier): static
    {
        if ($this->paniers->removeElement($panier)) {
            // set the owning side to null (unless already changed)
            if ($panier->getRestaurateur() === $this) {
                $panier->setRestaurateur(null);
            }
        }

        return $this;
    }
}
