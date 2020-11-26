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

    /**
     * @ORM\ManyToOne(targetEntity=Collecte::class, inversedBy="Fk_Role")
     */
    private $FK_Role;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="FK_Role")
     */
    private $Fk_User;

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

    public function getFKRole(): ?Collecte
    {
        return $this->FK_Role;
    }

    public function setFKRole(?Collecte $FK_Role): self
    {
        $this->FK_Role = $FK_Role;

        return $this;
    }

    public function getFkUser(): ?Utilisateur
    {
        return $this->Fk_User;
    }

    public function setFkUser(?Utilisateur $Fk_User): self
    {
        $this->Fk_User = $Fk_User;

        return $this;
    }
}
