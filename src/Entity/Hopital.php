<?php

namespace App\Entity;

use App\Repository\HopitalRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=HopitalRepository::class)
 */
class Hopital
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
    private $EFS_Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EFS_Adresse;

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $EFS_Zip;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $EFS_Ville;

    /**
     * @ORM\Column(type="geometry")
     */
    private $PosGeo;

    /**
     * @ORM\Column(type="integer")
     */
    private $Qte_Globule_Rouge;

    /**
     * @ORM\Column(type="integer")
     */
    private $Qte_plasma;

    /**
     * @ORM\Column(type="integer")
     */
    private $Qte_Plaquettes;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinQteGlr;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinQtePLSA;

    /**
     * @ORM\Column(type="integer")
     */
    private $MinQtePLAQ;

    /**
     * @ORM\OneToMany(targetEntity=Utilisateur::class, mappedBy="Fk_Patient")
     */
    private $Patient;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="Fk_Hopital")
     */
    private $FK_Patient;

    /**
     * @ORM\OneToMany(targetEntity=Collecte::class, mappedBy="Fk_Hopital")
     */
    private $Fk_Collecte;

    public function __construct()
    {
        $this->Patient = new ArrayCollection();
        $this->Fk_Collecte = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEFSNom(): ?string
    {
        return $this->EFS_Nom;
    }

    public function setEFSNom(string $EFS_Nom): self
    {
        $this->EFS_Nom = $EFS_Nom;

        return $this;
    }

    public function getEFSAdresse(): ?string
    {
        return $this->EFS_Adresse;
    }

    public function setEFSAdresse(string $EFS_Adresse): self
    {
        $this->EFS_Adresse = $EFS_Adresse;

        return $this;
    }

    public function getEFSZip(): ?string
    {
        return $this->EFS_Zip;
    }

    public function setEFSZip(string $EFS_Zip): self
    {
        $this->EFS_Zip = $EFS_Zip;

        return $this;
    }

    public function getEFSVille(): ?string
    {
        return $this->EFS_Ville;
    }

    public function setEFSVille(string $EFS_Ville): self
    {
        $this->EFS_Ville = $EFS_Ville;

        return $this;
    }

    public function getPosGeo()
    {
        return $this->PosGeo;
    }

    public function setPosGeo($PosGeo): self
    {
        $this->PosGeo = $PosGeo;

        return $this;
    }

    public function getQteGlobuleRouge(): ?int
    {
        return $this->Qte_Globule_Rouge;
    }

    public function setQteGlobuleRouge(int $Qte_Globule_Rouge): self
    {
        $this->Qte_Globule_Rouge = $Qte_Globule_Rouge;

        return $this;
    }

    public function getQtePlasma(): ?int
    {
        return $this->Qte_plasma;
    }

    public function setQtePlasma(int $Qte_plasma): self
    {
        $this->Qte_plasma = $Qte_plasma;

        return $this;
    }

    public function getQtePlaquettes(): ?int
    {
        return $this->Qte_Plaquettes;
    }

    public function setQtePlaquettes(int $Qte_Plaquettes): self
    {
        $this->Qte_Plaquettes = $Qte_Plaquettes;

        return $this;
    }

    public function getMinQteGlr(): ?int
    {
        return $this->MinQteGlr;
    }

    public function setMinQteGlr(int $MinQteGlr): self
    {
        $this->MinQteGlr = $MinQteGlr;

        return $this;
    }

    public function getMinQtePLSA(): ?int
    {
        return $this->MinQtePLSA;
    }

    public function setMinQtePLSA(int $MinQtePLSA): self
    {
        $this->MinQtePLSA = $MinQtePLSA;

        return $this;
    }

    public function getMinQtePLAQ(): ?int
    {
        return $this->MinQtePLAQ;
    }

    public function setMinQtePLAQ(int $MinQtePLAQ): self
    {
        $this->MinQtePLAQ = $MinQtePLAQ;

        return $this;
    }

    /**
     * @return Collection|Utilisateur[]
     */
    public function getPatient(): Collection
    {
        return $this->Patient;
    }

    public function addPatient(Utilisateur $patient): self
    {
        if (!$this->Patient->contains($patient)) {
            $this->Patient[] = $patient;
            $patient->setFkPatient($this);
        }

        return $this;
    }

    public function removePatient(Utilisateur $patient): self
    {
        if ($this->Patient->removeElement($patient)) {
            // set the owning side to null (unless already changed)
            if ($patient->getFkPatient() === $this) {
                $patient->setFkPatient(null);
            }
        }

        return $this;
    }

    public function getFKPatient(): ?Utilisateur
    {
        return $this->FK_Patient;
    }

    public function setFKPatient(?Utilisateur $FK_Patient): self
    {
        $this->FK_Patient = $FK_Patient;

        return $this;
    }

    /**
     * @return Collection|Collecte[]
     */
    public function getFkCollecte(): Collection
    {
        return $this->Fk_Collecte;
    }

    public function addFkCollecte(Collecte $fkCollecte): self
    {
        if (!$this->Fk_Collecte->contains($fkCollecte)) {
            $this->Fk_Collecte[] = $fkCollecte;
            $fkCollecte->setFkHopital($this);
        }

        return $this;
    }

    public function removeFkCollecte(Collecte $fkCollecte): self
    {
        if ($this->Fk_Collecte->removeElement($fkCollecte)) {
            // set the owning side to null (unless already changed)
            if ($fkCollecte->getFkHopital() === $this) {
                $fkCollecte->setFkHopital(null);
            }
        }

        return $this;
    }
}
