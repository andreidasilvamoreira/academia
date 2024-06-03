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
    public function find($id): ?Pessoa
    {
        $pessoa = $this->pessoa->find($id);

        return $pessoa ? Pessoa::factory($pessoa->toArray()) : null;
    }

    public function create(Pessoa $pessoa): Pessoa
    {
        $pessoaModel = $this->pessoa->query()->create($pessoa->toArray());

        return Pessoa::factory([
            'id' => $pessoaModel->id,
        ]);
    }
}
