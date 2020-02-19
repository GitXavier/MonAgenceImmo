<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BienRepository")
 */
class Bien
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
    private $proprietaire;

    /**
     * @ORM\Column(type="integer")
     */
    private $locataire;

    /**
     * @ORM\Column(type="integer")
     */
    private $transactionId;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $optionId;

    /**
     * @ORM\Column(type="integer")
     */
    private $pieceId;

    /**
     * @ORM\Column(type="integer")
     */
    private $chauffageId;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exposition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;

    /**
     * @ORM\Column(type="integer")
     */
    private $codePostal;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ville;

    /**
     * @ORM\Column(type="float")
     */
    private $altitude;

    /**
     * @ORM\Column(type="float")
     */
    private $longitude;

    /**
     * @ORM\Column(type="integer")
     */
    private $proximiteId;

    /**
     * @ORM\Column(type="integer")
     */
    private $typeDeBienId;

    /**
     * @ORM\Column(type="integer")
     */
    private $prix;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProprietaire(): ?int
    {
        return $this->proprietaire;
    }

    public function setProprietaire(int $proprietaire): self
    {
        $this->proprietaire = $proprietaire;

        return $this;
    }

    public function getLocataire(): ?int
    {
        return $this->locataire;
    }

    public function setLocataire(int $locataire): self
    {
        $this->locataire = $locataire;

        return $this;
    }

    public function getTransactionId(): ?int
    {
        return $this->transactionId;
    }

    public function setTransactionId(int $transactionId): self
    {
        $this->transactionId = $transactionId;

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

    public function getOptionId(): ?int
    {
        return $this->optionId;
    }

    public function setOptionId(int $optionId): self
    {
        $this->optionId = $optionId;

        return $this;
    }

    public function getPieceId(): ?int
    {
        return $this->pieceId;
    }

    public function setPieceId(int $pieceId): self
    {
        $this->pieceId = $pieceId;

        return $this;
    }

    public function getChauffageId(): ?int
    {
        return $this->chauffageId;
    }

    public function setChauffageId(int $chauffageId): self
    {
        $this->chauffageId = $chauffageId;

        return $this;
    }

    public function getExposition(): ?string
    {
        return $this->exposition;
    }

    public function setExposition(string $exposition): self
    {
        $this->exposition = $exposition;

        return $this;
    }

    public function getAdresse(): ?string
    {
        return $this->adresse;
    }

    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getAltitude(): ?float
    {
        return $this->altitude;
    }

    public function setAltitude(float $altitude): self
    {
        $this->altitude = $altitude;

        return $this;
    }

    public function getLongitude(): ?float
    {
        return $this->longitude;
    }

    public function setLongitude(float $longitude): self
    {
        $this->longitude = $longitude;

        return $this;
    }

    public function getProximiteId(): ?int
    {
        return $this->proximiteId;
    }

    public function setProximiteId(int $proximiteId): self
    {
        $this->proximiteId = $proximiteId;

        return $this;
    }

    public function getTypeDeBienId(): ?int
    {
        return $this->typeDeBienId;
    }

    public function setTypeDeBienId(int $typeDeBienId): self
    {
        $this->typeDeBienId = $typeDeBienId;

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): self
    {
        $this->prix = $prix;

        return $this;
    }
}
