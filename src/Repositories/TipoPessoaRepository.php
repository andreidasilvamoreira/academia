<?php

namespace App\Repositories;

use App\Entities\TipoPessoa;
use App\Models\TipoPessoaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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

    public function update(TipoPessoa $tipoPessoa)
    {
        try {
            $tipoPessoaModel = TipoPessoaModel::query()->find($tipoPessoa->getId());

            if (!$tipoPessoaModel) {
                throw new \Exception('Tipo Pessoa não existe na base de dados');
            }

            $tipoPessoaModel->fill($this->dataUpdate($tipoPessoa));

            return $tipoPessoaModel->save();
        } catch (ModelNotFoundException $exception) {
            return false;
        }
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