<?php

namespace app\models;

class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $image;
    protected $price;

    public function getTableName(): string
    {
        return 'products';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): Product
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): Product
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description): Product
    {
        $this->description = $description;
        return $this;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image): Product
    {
        $this->image = $image;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price): Product
    {
        $this->price = $price;
        return $this;
    }

}