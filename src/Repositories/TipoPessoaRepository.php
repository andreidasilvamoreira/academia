<?php

namespace App\Repositories;

use App\Entities\TipoPessoa;
use App\Models\TipoPessoaModel;

class TipoPessoaRepository extends AbstractRepository
{
    public function __construct(private TipoPessoaModel $tipoPessoa)
    {
    }

    protected function getTableName(): string
    {
        return $this->getTableName();
    }

    public function findAll()
    {
        return $this->tipoPessoa->all()->map(
            fn(TipoPessoaModel $tipoPessoa) => TipoPessoa::factory($tipoPessoa->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $tipoPessoa = $this->tipoPessoa->query()->find($id);

        return $tipoPessoa ? TipoPessoa::factory($tipoPessoa->toArray()) : null;
    }

    public function create(TipoPessoa $tipoPessoa)
    {
        $tipoPessoaModel = $this->tipoPessoa->query()->create($this->dataCreate($tipoPessoa));

        return $tipoPessoa->setId(
            $tipoPessoaModel->id
        );
    }

    public function update(TipoPessoa $tipoPessoa): bool
    {
        $tipoPessoaModel = $this->tipoPessoa->query()->findOrFail($tipoPessoa->getId());

        if ($tipoPessoaModel) {
            $tipoPessoaUpdate = $this->tipoPessoa->update($this->dataUpdate($tipoPessoa));

            if ($tipoPessoaUpdate) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    public function delete($id)
    {
        $tipoPessoaModel = TipoPessoaModel::query()->find($id);

        if (!$tipoPessoaModel) {
            throw new \Exception('TipoPessoa nao existe na base de dados');
        }

        return $tipoPessoaModel->delete();
    }

    public function dataCreate(TipoPessoa $tipoPessoa)
    {
        return [
            'nome' => $tipoPessoa->getNome(),
            'slug' => $tipoPessoa->getSlug()
        ];
    }

    public function dataUpdate(TipoPessoa $tipoPessoa)
    {
        return [
            'nome' => $tipoPessoa->getNome(),
            'slug' => $tipoPessoa->getSlug()
        ];
    }
}