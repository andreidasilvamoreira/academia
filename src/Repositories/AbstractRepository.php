<?php

namespace App\Repositories;

use App\Utils\Str;
use Illuminate\Database\Connection;
use Illuminate\Database\Query\Builder;
abstract class AbstractRepository
{
    protected Connection $db;

    abstract protected function getTableName(): string;

    public function initTransaction(): void
    {
        $this->db->beginTransaction();
    }

    public function commitTransaction(): void
    {
        $this->db->commit();
    }

    /**
     * @throws \Throwable
     */
    public function rollBackTransaction(): void
    {
        $this->db->rollBack();
    }

    protected function getQuery(string $alias = null, $softDelete = true): Builder
    {
        return  $this->db->query()->from($this->getTableName(), $alias);
    }

    /**
     * @param string[] $withAssociations
     * @param string[] $withAssociationsSupported
     * @return string[]
     */
    protected function convertAssociationsToWithModel(array $withAssociations, array $withAssociationsSupported): array
    {
        return array_map(
            fn($item) => Str::camel($item),
            array_intersect($withAssociations, $withAssociationsSupported)
        );
    }
}