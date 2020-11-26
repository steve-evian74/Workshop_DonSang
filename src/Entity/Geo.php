<?php

namespace App\Entity;

use App\Repository\GeoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GeoRepository::class)
 */
class Geo
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
    private $P;

    /**
     * @ORM\Column(type="geometry", nullable=true)
     */
    private $Pos;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getP(): ?string
    {
        return $this->P;
    }

    public function setP(string $P): self
    {
        $this->P = $P;

        return $this;
    }

    public function getPos()
    {
        return $this->Pos;
    }

    public function setPos($Pos): self
    {
        $this->Pos = $Pos;

        return $this;
    }
}
