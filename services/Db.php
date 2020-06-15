<?php

namespace app\services;

class Db
{
    private $conn = null;
    private $DB_CONFIG = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'dbname' => 'php-pro',
        'user' => 'php-pro',
        'password' => 'A4m6E6s3R0p7E3g1',
        'charset' => 'utf8',
    ];
    public function getConnection() {
        if (is_null($this->conn)) {
            $this->conn = new \PDO(
                $this->buildConnectString(),
                $this->DB_CONFIG['user'],
                $this->DB_CONFIG['password']);
        }
        return $this->conn;

    }

    private function query(string $sql, array $params = [])
    {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
    }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function queryOne($sql)
    {
        return [];
    }

    public function queryAll($sql)
    {
        return [];
    }
    private function buildConnectString() {
        return sprintf( // TODO

            '',

        );
    }
}