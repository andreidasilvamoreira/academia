<?php

namespace App\Repositories;

use App\Utils\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\ConnectionInterface;

abstract class AbstractRepository
{
    protected ConnectionInterface $db;

    public function __construct()
    {
        $this->initDb();
    }

    protected function initDb()
    {
        $this->db = Model::getConnectionResolver()->connection();
    }

    abstract protected function getTableName(): string;

    /**
     * @throws \Throwable
     */
    public function initTransaction(): void
    {
        $this->ensureDbInitialized();
        $this->db->beginTransaction();
    }

    /**
     * @throws \Throwable
     */
    public function commitTransaction(): void
    {
        $this->ensureDbInitialized();
        $this->db->commit();
    }

    /**
     * @throws \Throwable
     */
    public function rollBackTransaction(): void
    {
        $this->ensureDbInitialized();
        $this->db->rollBack();
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

    protected function ensureDbInitialized()
    {
        if (!isset($this->db)) {
            $this->initDb();
        }
    }
}
