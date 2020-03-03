<?php


namespace App\Entity;




use Doctrine\Common\Collections\ArrayCollection;

class PropertySearch
{
    /**
     * @var int|null
     */
    private $maxPrice;

    /**
     * @var int|null
     */
    private $minSurface;

    /**
     * @var ArrayCollection
     */
    private $criteres;

    public function __construct()
    {
        $this->criteres = new ArrayCollection();
    }

    /**
     * @var string|null
     */
    private $city;

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     * @return PropertySearch
     */
    public function setCity(string $city): PropertySearch
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * @param int|null $maxPrice
     * @return PropertySearch
     */
    public function setMaxPrice(int $maxPrice): PropertySearch
    {
        $this->maxPrice = $maxPrice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySearch
     */
    public function setMinSurface(int $minSurface): PropertySearch
    {
        $this->minSurface = $minSurface;
        return $this;
    }

    /**
     * @return ArrayCollection
     */
    public function getCriteres(): ArrayCollection
    {
        return $this->criteres;
    }

    /**
     * @param ArrayCollection $criteres
     * @return PropertySearch
     */
    public function setCriteres(ArrayCollection $criteres): PropertySearch
    {
        $this->criteres = $criteres;
        return $this;
    }

}