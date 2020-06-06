<?php


namespace models;


class Orders extends Model
{
    protected $id;
    protected $user_id;
    protected $date;
    protected $status_id;
    protected $totalAmount;

    public function getTableName(): string
    {
        return 'orders';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): Orders
    {
        $this->id = $id;
        return $this;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId($user_id): Orders
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date): Orders
    {
        $this->date = $date;
        return $this;
    }

    public function getStatusId()
    {
        return $this->status_id;
    }

    public function setStatusId($status_id): Orders
    {
        $this->status_id = $status_id;
        return $this;
    }

    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    public function setTotalAmount($totalAmount): Orders
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

}