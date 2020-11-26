<?php

namespace App\Entity;

use App\Repository\RoleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RoleRepository::class)
 */
class Role
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $Description_Role;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescriptionRole(): ?string
    {
        return $this->Description_Role;
    }

    public function setDescriptionRole(string $Description_Role): self
    {
        $this->Description_Role = $Description_Role;

        return $this;
    }
}
