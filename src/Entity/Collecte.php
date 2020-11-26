<?php

namespace App\Entity;

use App\Repository\CollecteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CollecteRepository::class)
 */
class Collecte
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom_Collecte;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_Collecte;

    /**
     * @ORM\Column(type="integer")
     */
    private $Globule_Rouge;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite_GRouge;

    /**
     * @ORM\Column(type="integer")
     */
    private $Plaquette;

    /**
     * @ORM\Column(type="integer")
     */
    private $Quantite_Plaquette;

    /**
     * @ORM\Column(type="integer")
     */
    private $Plasma;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Quantite_Plas;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Fk_Collecte")
     */
    private $Fk_Utilisateur;

    /**
     * @ORM\ManyToOne(targetEntity=Hopital::class, inversedBy="Fk_Collecte")
     */
    private $Fk_Hopital;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="FK_Role")
     */
    private $Fk_Role;

    public function __construct()
    {
        $this->Fk_Role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomCollecte(): ?string
    {
        return $this->Nom_Collecte;
    }

    public function setNomCollecte(string $Nom_Collecte): self
    {
        $this->Nom_Collecte = $Nom_Collecte;

        return $this;
    }

    public function getDateCollecte(): ?\DateTimeInterface
    {
        return $this->Date_Collecte;
    }

    public function setDateCollecte(\DateTimeInterface $Date_Collecte): self
    {
        $this->Date_Collecte = $Date_Collecte;

        return $this;
    }

    public function getGlobuleRouge(): ?int
    {
        return $this->Globule_Rouge;
    }

    public function setGlobuleRouge(int $Globule_Rouge): self
    {
        $this->Globule_Rouge = $Globule_Rouge;

        return $this;
    }

    public function getQuantiteGRouge(): ?int
    {
        return $this->Quantite_GRouge;
    }

    public function setQuantiteGRouge(int $Quantite_GRouge): self
    {
        $this->Quantite_GRouge = $Quantite_GRouge;

        return $this;
    }

    public function getPlaquette(): ?int
    {
        return $this->Plaquette;
    }

    public function setPlaquette(int $Plaquette): self
    {
        $this->Plaquette = $Plaquette;

        return $this;
    }

    public function getQuantitePlaquette(): ?int
    {
        return $this->Quantite_Plaquette;
    }

    public function setQuantitePlaquette(int $Quantite_Plaquette): self
    {
        $this->Quantite_Plaquette = $Quantite_Plaquette;

        return $this;
    }

    public function getPlasma(): ?int
    {
        return $this->Plasma;
    }

    public function setPlasma(int $Plasma): self
    {
        $this->Plasma = $Plasma;

        return $this;
    }

    public function getQuantitePlas(): ?int
    {
        return $this->Quantite_Plas;
    }

    public function setQuantitePlas(?int $Quantite_Plas): self
    {
        $this->Quantite_Plas = $Quantite_Plas;

        return $this;
    }

    public function getFkUtilisateur(): ?Utilisateur
    {
        return $this->Fk_Utilisateur;
    }

    public function setFkUtilisateur(?Utilisateur $Fk_Utilisateur): self
    {
        $this->Fk_Utilisateur = $Fk_Utilisateur;

        return $this;
    }

    public function getFkHopital(): ?Hopital
    {
        return $this->Fk_Hopital;
    }

    public function setFkHopital(?Hopital $Fk_Hopital): self
    {
        $this->Fk_Hopital = $Fk_Hopital;

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getFkRole(): Collection
    {
        return $this->Fk_Role;
    }

    public function addFkRole(Role $fkRole): self
    {
        if (!$this->Fk_Role->contains($fkRole)) {
            $this->Fk_Role[] = $fkRole;
            $fkRole->setFKRole($this);
        }

        return $this;
    }

    public function removeFkRole(Role $fkRole): self
    {
        if ($this->Fk_Role->removeElement($fkRole)) {
            // set the owning side to null (unless already changed)
            if ($fkRole->getFKRole() === $this) {
                $fkRole->setFKRole(null);
            }
        }

        return $this;
    }
}
