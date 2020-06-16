<?php
namespace app\models;


class Product extends Model
{
    protected $id;
    protected $name;
    protected $description;
    protected $price;
    protected $category_id;

    public function getTableName(): string
    {
        return "products";
    }
}