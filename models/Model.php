<?php

namespace app\models;

use app\interfaces\IModel;
use app\services\Db;

abstract class Model implements IModel
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryOne($sql, [':id' => $id]);
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function deleteObjById(int $id)
    {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id]);
    }

    public function updateObjById(int $id, string $field, $newValue)
    {
        $sql = "UPDATE {$this->tableName} SET :field = :newValue WHERE id = :id";
        return $this->db->execute($sql, [':id' => $id, 'field' => $field, 'newValue' => $newValue]);
    }

    abstract public function getTableName(): string;
}