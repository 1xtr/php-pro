<?php
namespace app\interfaces;

interface IModel
{
    public function getById(int $id): array;

    public function getAll(): array;

    public function getTableName(): string;
}