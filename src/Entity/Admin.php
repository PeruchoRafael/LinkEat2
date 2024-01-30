<?php

namespace App\Entity;

use App\Repository\AdminRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdminRepository::class)]
#[ORM\Table(name: '`admin`')]
class Admin extends User
{
    #[ORM\Column(length: 255)]
    private ?string $username = null;

    public function getAdminUsername(): ?string
    {
        return $this->username;
    }

    public function setAdminUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    public function getRoles(): array
    {
        return ['ROLE_ADMIN'];
    }
}
