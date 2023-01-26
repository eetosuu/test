<?php

namespace app\model;

class Realty
{
    public int $id;
    public string $name;
    public string $address;
    public float $price;
    public string $description;
    public string $path_img;
    public bool $is_relevance;
    public string $apartment;
    public string $street;
    public string $home;

    /**
     * @return int
     */
    public function getApartment(): int
    {
        return $this->apartment;
    }

    /**
     * @param int $apartment
     * @return $this
     */
    public function setApartment(int $apartment): self
    {
        $this->apartment = $apartment;
        return $this;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     * @return $this
     */
    public function setStreet(string $street): self
    {
        $this->street = $street;
        return $this;
    }

    /**
     * @return string
     */
    public function getHome(): string
    {
        return $this->home;
    }

    /**
     * @param string $home
     * @return $this
     */
    public function setHome(string $home): self
    {
        $this->home = $home;
        return $this;
    }


    /**
     * @param int $id
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return bool
     */
    public function isRelevance(): bool
    {
        return $this->is_relevance;
    }

    /**
     * @param bool $is_relevance
     * @return $this
     */
    public function setIsRelevance(bool $is_relevance): self
    {
        $this->is_relevance = $is_relevance;
        return $this;

    }


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     * @return $this
     */
    public function setAddress(string $address): self
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrice(): float
    {
        return $this->price;
    }

    /**
     * @param float $price
     * @return $this
     */
    public function setPrice(float $price): self
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return $this
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getPathImg(): string
    {
        return $this->path_img;
    }

    /**
     * @param string $path_img
     * @return $this
     */
    public function setPathImg(string $path_img): self
    {
        $this->path_img = $path_img;
        return $this;
    }


}