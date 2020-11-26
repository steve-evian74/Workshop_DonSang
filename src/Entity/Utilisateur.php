<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 */
class Utilisateur
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
    private $User_Nom;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Prenom;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $User_Phone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Adresse;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Ville;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_Email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $User_GroupSang;

    /**
     * @ORM\ManyToOne(targetEntity=Hopital::class, inversedBy="Patient")
     */
    private $Fk_Patient;

    /**
     * @ORM\OneToMany(targetEntity=Hopital::class, mappedBy="FK_Patient")
     */
    private $Fk_Hopital;

    /**
     * @ORM\OneToMany(targetEntity=Collecte::class, mappedBy="Fk_Utilisateur")
     */
    private $Fk_Collecte;

    /**
     * @ORM\OneToMany(targetEntity=Role::class, mappedBy="Fk_User")
     */
    private $FK_Role;

    public function __construct()
    {
        $this->Fk_Hopital = new ArrayCollection();
        $this->Fk_Collecte = new ArrayCollection();
        $this->FK_Role = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserNom(): ?string
    {
        return $this->User_Nom;
    }

    public function setUserNom(string $User_Nom): self
    {
        $this->User_Nom = $User_Nom;

        return $this;
    }

    public function getUserPrenom(): ?string
    {
        return $this->User_Prenom;
    }

    public function setUserPrenom(string $User_Prenom): self
    {
        $this->User_Prenom = $User_Prenom;

        return $this;
    }

    public function getUserPhone(): ?string
    {
        return $this->User_Phone;
    }

    public function setUserPhone(string $User_Phone): self
    {
        $this->User_Phone = $User_Phone;

        return $this;
    }

    public function getUserAdresse(): ?string
    {
        return $this->User_Adresse;
    }

    public function setUserAdresse(string $User_Adresse): self
    {
        $this->User_Adresse = $User_Adresse;

        return $this;
    }

    public function getUserVille(): ?string
    {
        return $this->User_Ville;
    }

    public function setUserVille(string $User_Ville): self
    {
        $this->User_Ville = $User_Ville;

        return $this;
    }

    public function getUserPassword(): ?string
    {
        return $this->User_Password;
    }

    public function setUserPassword(string $User_Password): self
    {
        $this->User_Password = $User_Password;

        return $this;
    }

    public function getUserEmail(): ?string
    {
        return $this->User_Email;
    }

    public function setUserEmail(string $User_Email): self
    {
        $this->User_Email = $User_Email;

        return $this;
    }

    public function getUserGroupSang(): ?string
    {
        return $this->User_GroupSang;
    }

    public function setUserGroupSang(string $User_GroupSang): self
    {
        $this->User_GroupSang = $User_GroupSang;

        return $this;
    }

    public function getFkPatient(): ?Hopital
    {
        return $this->Fk_Patient;
    }

    public function setFkPatient(?Hopital $Fk_Patient): self
    {
        $this->Fk_Patient = $Fk_Patient;

        return $this;
    }

    /**
     * @return Collection|Hopital[]
     */
    public function getFkHopital(): Collection
    {
        return $this->Fk_Hopital;
    }

    public function addFkHopital(Hopital $fkHopital): self
    {
        if (!$this->Fk_Hopital->contains($fkHopital)) {
            $this->Fk_Hopital[] = $fkHopital;
            $fkHopital->setFKPatient($this);
        }

        return $this;
    }

    public function removeFkHopital(Hopital $fkHopital): self
    {
        if ($this->Fk_Hopital->removeElement($fkHopital)) {
            // set the owning side to null (unless already changed)
            if ($fkHopital->getFKPatient() === $this) {
                $fkHopital->setFKPatient(null);
            }
        }

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
            $fkCollecte->setFkUtilisateur($this);
        }

        return $this;
    }

    public function removeFkCollecte(Collecte $fkCollecte): self
    {
        if ($this->Fk_Collecte->removeElement($fkCollecte)) {
            // set the owning side to null (unless already changed)
            if ($fkCollecte->getFkUtilisateur() === $this) {
                $fkCollecte->setFkUtilisateur(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Role[]
     */
    public function getFKRole(): Collection
    {
        return $this->FK_Role;
    }

    public function addFKRole(Role $fKRole): self
    {
        if (!$this->FK_Role->contains($fKRole)) {
            $this->FK_Role[] = $fKRole;
            $fKRole->setFkUser($this);
        }

        return $this;
    }

    public function removeFKRole(Role $fKRole): self
    {
        if ($this->FK_Role->removeElement($fKRole)) {
            // set the owning side to null (unless already changed)
            if ($fKRole->getFkUser() === $this) {
                $fKRole->setFkUser(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->User_Nom;
    }
}
