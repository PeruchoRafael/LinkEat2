<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: "text")]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $price = null;

    #[ORM\Column]
    private ?int $quantity = null;

    #[ORM\OneToMany(mappedBy: 'product', targetEntity: Orderline::class)]
    private Collection $orderlines;

    #[ORM\ManyToOne(targetEntity: Category::class, inversedBy: 'products')]
    private ?Category $category = null;

    #[ORM\ManyToOne(targetEntity: Supplier::class, inversedBy: 'products')]
    private ?Supplier $supplier = null;

    public function __construct()
    {
        $this->orderlines = new ArrayCollection();
    }

    // ID
    public function getId(): ?int
    {
        return $this->id;
    }

    // Name
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    // Description
    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    // Price
    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    // Quantity
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity): self
    {
        $this->quantity = $quantity;
        return $this;
    }

    // Decrement Stock
    public function decrementStock(int $quantity): void
    {
        if ($this->quantity < $quantity) {
            throw new \LogicException('Not enough stock.');
        }
        $this->quantity -= $quantity;
    }

    // Orderlines
    /**
     * @return Collection|Orderline[]
     */
    public function getOrderlines(): Collection
    {
        return $this->orderlines;
    }

    public function addOrderline(Orderline $orderline): self
    {
        if (!$this->orderlines->contains($orderline)) {
            $this->orderlines[] = $orderline;
            $orderline->setProduct($this);
        }
        return $this;
    }

    public function removeOrderline(Orderline $orderline, Product $product): self
    {
        if ($this->orderlines->removeElement($orderline) && $orderline->getProduct() === $this) {
            $orderline->setProduct($product);   
        }
        return $this;
    }

    // Category
    public function getCategory(): ?Category
    {
        return $this->category;
    }

    public function setCategory(?Category $category): self
    {
        $this->category = $category;
        return $this;
    }

    // Supplier
    public function getSupplier(): ?Supplier
    {
        return $this->supplier;
    }

    public function setSupplier(?Supplier $supplier): self
    {
        $this->supplier = $supplier;
        return $this;
    }
}
