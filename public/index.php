<?php
class Product {
    public $id;
    public $name;
    public $image;
    public $price;

    public function getAllProducts() {
    //some code
    }
    public function getProductByID($id) {
        //$sql = "$id";
    }

}

class CartProduct extends Product {
    public function __construct($productID) {
        $cartProduct = self::getProductByID($productID);
    }

}
