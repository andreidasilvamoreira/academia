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
        return $this->tipoPessoa->getTable();
    }

    public function findAll()
    {
        return $this->tipoPessoa->all()->map(
            fn(TipoPessoaModel $tipoPessoa) => TipoPessoa::factory($tipoPessoa->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $tipoPessoa = $this->tipoPessoa
            ->with(['pessoas'])
            ->find($id);

        if ($tipoPessoa) {
            foreach ($tipoPessoa->pessoas as $pessoa) {
                $pessoa->MakeHidden(['pessoa_id', 'tipo_pessoa_id']);
            }
        }
        return $tipoPessoa;
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
        try {
            $tipoPessoaModel = TipoPessoaModel::query()->find($tipoPessoa->getId());
            if (!$tipoPessoaModel) {
                throw new \Exception('Tipo Pessoa não existe na base de dados');
            }

            $tipoPessoaModel->fill($this->dataCreate($tipoPessoa));
            $tipoPessoaModel->save();

            return $tipoPessoaModel;
        } catch (ModelNotFoundException) {

        }
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