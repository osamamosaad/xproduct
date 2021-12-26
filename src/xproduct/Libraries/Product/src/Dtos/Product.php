<?php

namespace Xproduct\Libraries\Product\Dtos;

class Product
{
    private int $id;
    private string $sku;
    private string $name;
    private string $category;
    private float $price;
    private float $finalPrice;
    private ?string $discountPercentage = null;
    private string $currency;

    public function setId(int $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setSku(string $sku): self
    {
        $this->sku = $sku;
        return $this;
    }

    public function getSku(): string
    {
        return $this->sku;
    }

    public function setCategory(string $category): self
    {
        $this->category = $category;
        return $this;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;
        $this->setFinalPrice($price);

        return $this;
    }

    public function getPrice(): float
    {
        return $this->price;
    }

    public function setFinalPrice($finalPrice): self
    {
        if (!is_null($finalPrice)) {
            $this->finalPrice = $finalPrice;
        }

        return $this;
    }

    public function getFinalPrice(): float
    {
        return $this->finalPrice;
    }

    public function setDiscountPercentage(?string $discountPercentage): self
    {
        $this->discountPercentage = $discountPercentage;

        return $this;
    }

    public function getDiscountPercentage(): ?string
    {
        return $this->discountPercentage ? $this->discountPercentage . "%" : null;
    }

    public function setCurrency(string $currency): self
    {
        $this->currency = $currency;

        return $this;
    }

    public function getCurrency(): string
    {
        return $this->currency;
    }
}
