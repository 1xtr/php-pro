<?php
namespace interfaces;

interface ModelInterface
{
    public function getById(int $id): array;

    public function getAll(): array;

    public function getTableName(): string;
}