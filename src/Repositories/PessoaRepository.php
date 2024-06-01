<?php

namespace App\Repositories;

use App\Domain\User\UserNotFoundException;
use App\Entities\Pessoa;
use App\Models\PessoaModel;

class PessoaRepository extends AbstractRepository
{

    public function __construct(private PessoaModel $pessoa)
    {
    }

    protected function getTableName(): string
    {
        return $this->pessoa->getTable();
    }

    public function findAll(): array
    {
        return $this->pessoa->all()->map(
            fn(PessoaModel $pessoa) => Pessoa::factory($pessoa->toArray())
        )->toArray();
    }

}
