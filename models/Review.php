<?php


namespace app\models;


class Review extends Model
{
    protected $id;
    protected $content;
    protected $date;
    protected $author;

    public function getTableName(): string
    {
        return "product_review";
    }

    public function addReview(string $review, int $productID, int $userID) {
        $sql = "INSERT INTO {$this->tableName} VALUES (DEFAULT, :review, NOW(), :productID, :userID)";
        return $this->db->execute($sql);
    }

    public function getAllReviews(int $product_id) {
        $sql = "SELECT REVIEWS.*, AUTHOR.login FROM {$this->tableName} as REVIEWS INNER JOIN users as AUTHOR 
                WHERE REVIEWS.author = AUTHOR.id AND REVIEWS.product_id = :product_id";
        return $this->db->execute($sql);
    }
}

