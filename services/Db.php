<?php

namespace app\services;

use app\traits\TSingleton;

class Db
{
    use  TSingleton;

    /**
     * @var \PDO
     */
    private $conn = null;
    private $DB_CONFIG = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'shop',
        'user' => 'shop_user',
        'password' => 'H6=b5D8b6-F1h8+G7t6',
        'charset' => 'utf8',
    ];
    /*
        'dbname' => 'php-pro',
        'user' => 'php-pro',
        'password' => 'A4m6E6s3R0p7E3g1',
    */

    public function getConnection()
    {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->buildConnectString(),
                $this->DB_CONFIG['user'],
                $this->DB_CONFIG['password']
            );
            $this->conn->setAttribute(
                \PDO::ATTR_DEFAULT_FETCH_MODE,
                \PDO::FETCH_ASSOC,
            );
        }

        return $this->conn;
    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function queryObj(string $className, string $sql, array $params = [])
    {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS, \PDO::FETCH_PROPS_LATE, $className);
        return $pdoStatement->fetchAll();
    }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    private function buildConnectString()
    {
        return sprintf(
            '%s:host=%s;dbname=%s;charset=%s',
            $this->DB_CONFIG['driver'],
            $this->DB_CONFIG['host'],
            $this->DB_CONFIG['dbname'],
            $this->DB_CONFIG['charset'],
        );
    }
}