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

    public function addProduct(string $name, string $price, string $desc, int $imageID)
    {
        $sql = "INSERT INTO {$this->tableName} (name, price, full_desc, image_id)
                VALUES (
                    :name,
                    :price,
                    :desc,
                    :imageID,
                )";
        return $this->db->execute($sql, [
            ':name' => $name,
            ':price' => $price,
            ':desc' => $desc,
            ':imageID' => $imageID]);
    }

    public function getProductQttByID(int $productID) {
        $sql = "SELECT ITEM.quantity FROM {$this->tableName} as ITEM WHERE ITEM.id = :productID";
        return $this->db->queryOne($sql, [':productID' => $productID]);
    }
}