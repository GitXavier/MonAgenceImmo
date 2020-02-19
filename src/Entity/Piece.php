<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PieceRepository")
 */
class Piece
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $typeDePieceId;

    /**
     * @ORM\Column(type="integer")
     */
    private $bienId;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTypeDePieceId(): ?int
    {
        return $this->typeDePieceId;
    }

    public function setTypeDePieceId(int $typeDePieceId): self
    {
        $this->typeDePieceId = $typeDePieceId;

        return $this;
    }

    public function getBienId(): ?int
    {
        return $this->bienId;
    }

    public function setBienId(int $bienId): self
    {
        $this->bienId = $bienId;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }
}
