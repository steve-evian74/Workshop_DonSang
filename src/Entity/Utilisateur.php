<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
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
}
