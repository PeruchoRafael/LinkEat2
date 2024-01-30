<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $orderDate = null;

    #[ORM\ManyToOne(targetEntity: Supplier::class, inversedBy: 'orders')]
    private ?Supplier $supplier = null;

    #[ORM\ManyToOne(targetEntity: Restaurateur::class, inversedBy: 'orders')]
    private ?Restaurateur $restaurateur = null;

    #[ORM\Column(length: 255)]
    private ?string $status = null;

    #[ORM\OneToMany(targetEntity: Orderline::class, mappedBy: 'order', cascade: ['persist', 'remove'])]
    private Collection $orderlines;

    public function __construct()
    {
        $this->orderlines = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrderDate(): ?\DateTimeImmutable
    {
        return $this->orderDate;
    }

    public function setOrderDate(\DateTimeImmutable $orderDate): self
    {
        $this->orderDate = $orderDate;

        return $this;
    }

    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;

        return $this;
    }

    public function getRestaurateur(): ?Restaurateur
    {
        return $this->restaurateur;
    }

    public function setRestaurateur(?Restaurateur $restaurateur): self
    {
        $this->restaurateur = $restaurateur;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection<int, Orderline>
     */
    public function getOrderlines(): Collection
    {
        return $this->orderlines;
    }

    public function addOrderline(Orderline $orderline): self
    {
        if (!$this->orderlines->contains($orderline)) {
            $this->orderlines->add($orderline);
            $orderline->setOrder($this);
        }

        return $this;
    }

    public function removeOrderline(Orderline $orderline, Order $order): self
    {
        if ($this->orderlines->removeElement($orderline)) {
            // Set the owning side to null (unless already changed)
            if ($orderline->getOrder() === $this) {
                $orderline->setOrder($order);
            }
        }

        return $this;
    }
}
