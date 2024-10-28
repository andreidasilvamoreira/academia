<?php

namespace App\Repositories;

use App\Entities\TempoFicha;
use App\Models\TempoFichaModel;
use App\Services\TempoFichaService;

class TempoFichaRepository extends AbstractRepository
{
    public function __construct(private TempoFichaModel $tempoFichaModel)
    {
    }
    protected function getTableName(): string
    {
        return $this->tempoFichaModel->getTable();
    }

    public function findAll()
    {
        return $this->tempoFichaModel->all()->map(
            fn(TempoFichaModel $tempoFichaModel) => TempoFicha::factory($tempoFichaModel->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $tempoFicha = $this->tempoFichaModel->query()->find($id);

        return $tempoFicha ? TempoFicha::factory($tempoFicha->toArray()): null;
    }

    public function create(TempoFicha $tempoFicha)
    {
        $tempoFichaModel = TempoFichaModel::query()->create($this->dataCreate($tempoFicha));
        return $tempoFicha->setId(
            $tempoFichaModel->id
        );
    }

    public function update(TempoFicha $tempoFicha)
    {
        try {
            $tempoFichaModel = TempoFichaModel::query()->find($tempoFicha->getId());
            if (!$tempoFichaModel) {
                throw new \Exception('Tempo Ficha não existe na base de dados');
            }

            $tempoFichaModel->fill($this->dataCreate($tempoFicha));
            return $tempoFichaModel->save();
        } catch (ModelNotFoundException) {
        }
    }

    public function delete($id)
    {
        $tempoFichaModel = TempoFichaModel::query()->find($id);
        if (!$tempoFichaModel) {
            throw new \Exception('Tempo Ficha não existe na base de dados');
        }

        return $tempoFichaModel->delete();
    }

    public function dataCreate(TempoFicha $tempoFicha)
    {
        return [
            'data_inicio' => $tempoFicha->getDataInicio(),
            'data_fim' => $tempoFicha->getDataFim(),
            'quantidade_dias' => $tempoFicha->getQuantidadeDias(),
            'pessoa_id' => $tempoFicha->getPessoaId()
        ];
    }

    public function dataUpdate(TempoFicha $tempoFicha)
    {
        return [
            'id' => $tempoFicha->getId(),
            'data_inicio' => $tempoFicha->getDataInicio(),
            'data_fim' => $tempoFicha->getDataFim(),
            'quantidade_dias' => $tempoFicha->getQuantidadeDias(),
            'pessoa_id' => $tempoFicha->getPessoaId()
        ];
    }
}