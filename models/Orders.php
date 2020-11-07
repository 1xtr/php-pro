<?php


namespace app\models;


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

    public function getAllOrders(int $userID) {
        $sql = "SELECT orders.id, orders.date, STATUS.name as status, orders.order_amount as total 
                    FROM {$this->tableName}, order_status AS STATUS 
                WHERE user_id = :userID AND STATUS.id = orders.status_id";
        return $this->db->queryAll($sql, [':userID' => $userID]);
    }
    public function getAllOrdersItems(string $orderIDs) {
        $sql = "SELECT ITEMS.order_id,products.name, ITEMS.quantity, products.price 
                    FROM order_items as ITEMS, products
                    WHERE order_id IN (:orderIDs) AND ITEMS.product_id = products.id";
        return $this->db->queryAll($sql, [':orderIDs' => $orderIDs]);
    }

    public function makeOrder(array $cart, int $userID) {
        $sql = "INSERT INTO {$this->tableName} (user_id) VALUES (:userID)";
        $this->db->execute($sql, [':userID' => $userID]); // создаем заказ и возвращаем его ID в базе
        $orderID = $this->db->getLastInsertId();
        $orderValue = [];
        foreach ($cart as $key => $item) {
            $orderValue[] = "($orderID, $key, $item)";
        }
        $orderValue = implode(',', $orderValue);
        $sql = "INSERT INTO order_items (order_id, product_id, quantity) VALUES :orderValue";
        $this->db->execute($sql, [':orderValue' => $orderValue]);
        return $orderID;
    }

}