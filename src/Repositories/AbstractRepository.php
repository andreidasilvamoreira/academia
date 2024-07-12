<?php

namespace App\Repositories;

use App\Utils\Str;
use Illuminate\Database\Capsule\Manager as Capsule;

abstract class AbstractRepository
{

    protected function getDb()
    {
        return Capsule::connection();
    }

    abstract protected function getTableName(): string;

    /**
     * @throws \Throwable
     */
    public function initTransaction(): void
    {
        $this->getDb()->beginTransaction();
    }

    /**
     * @throws \Throwable
     */
    public function commitTransaction(): void
    {
        $this->getDb()->commit();
    }

    /**
     * @throws \Throwable
     */
    public function rollBackTransaction(): void
    {
        $this->getDb()->rollBack();
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
