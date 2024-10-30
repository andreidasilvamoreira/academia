<?php

namespace App\Repositories;

use App\Entities\Repeticao;
use App\Models\RepeticaoModel;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class RepeticaoRepository extends AbstractRepository
{
    public function __construct(private RepeticaoModel $repeticaoModel)
    {
    }
    protected function getTableName(): string
    {
        return $this->repeticaoModel->getTable();
    }

    public function findAll()
    {
        return $this->repeticaoModel->all()->map(
            fn(RepeticaoModel $repeticaoModel) => Repeticao::factory($repeticaoModel->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $repeticao = $this->repeticaoModel->query()->find($id);

        return $repeticao ? Repeticao::factory($repeticao->toArray()): null;
    }

    public function create(Repeticao $repeticao)
    {
        $repeticaoModel = $this->repeticaoModel->query()->create($this->dataCreate($repeticao));
        return $repeticao->setId(
            $repeticaoModel->id
        );
    }

    public function update(Repeticao $repeticao)
    {
        try {
            $repeticaoModel = RepeticaoModel::query()->find($repeticao->getId());
            if (!$repeticaoModel) {
                throw new \Exception('Repetição não existe na base de dados');
            }

            $repeticaoModel->fill($this->dataCreate($repeticao));
            $repeticaoModel->save();

            return $repeticaoModel;
        } catch (ModelNotFoundException) {

        }
    }

    public function delete($id)
    {
        $repeticaoModel = RepeticaoModel::query()->find($id);

        if (!$repeticaoModel) {
            throw new \Exception('Repetição não existe na base de dados' );
        }
        return $repeticaoModel->delete();
    }

    public function dataCreate(Repeticao $repeticao)
    {
        return [
            'quantidade_repeticoes' => $repeticao->getQuantidadeRepeticoes(),
            'tempo_descanso' => $repeticao->getTempoDescanso()
        ];
    }

    public function dataUpdate(Repeticao $repeticao)
    {
        return [
            'id' => $repeticao->getId(),
            'quantidade_repeticoes' => $repeticao->getQuantidadeRepeticoes(),
            'tempo_descanso' => $repeticao->getTempoDescanso()
        ];
    }
}