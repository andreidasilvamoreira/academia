<?php

namespace App\Repositories;

use App\Entities\TreinoDiario;
use App\Models\TreinoDiarioModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TreinoDiarioRepository extends AbstractRepository
{
    public function __construct(private TreinoDiarioModel $treinoDiarioModel)
    {
    }
    protected function getTableName(): string
    {
        return $this->treinoDiarioModel->getTable();
    }

    public function findAll()
    {
        return $this->treinoDiarioModel->all()->map(
            fn(TreinoDiarioModel $treinoDiarioModel) => TreinoDiario::factory($treinoDiarioModel->toArray())
        )->toArray();
    }

    public function findWithExercicio($id)
    {
        $treinoDiario = $this->treinoDiarioModel
            ->with(['exercicio'])
            ->find($id);

        if ($treinoDiario) {
            foreach ($treinoDiario->exercicio as $exercicio) {
                $exercicio->Makehidden(['pivot']);
            }
        }

        return $treinoDiario;
    }

    public function create(TreinoDiario $treinoDiario)
    {
        $treinoDiarioModel = TreinoDiarioModel::query()->create($this->dataCreate($treinoDiario));
        return $treinoDiario->setId(
            $treinoDiarioModel->id
        );
    }

    public function update(TreinoDiario $treinoDiario)
    {
        try {
            $treinoDiarioModel = TreinoDiarioModel::query()->find($treinoDiario->getId());
            if (!$treinoDiarioModel) {
                throw new \Exception('Treino Diario não existe na base de dados');
            }

            $treinoDiarioModel->fill($this->dataCreate($treinoDiario));
            $treinoDiarioModel->save();

            return $treinoDiarioModel;
        } catch (ModelNotFoundException) {

        }
    }

    public function delete($id)
    {
        $idTreinoDiario = $this->treinoDiarioModel->query()->find($id);

        if (!$idTreinoDiario) {
            throw new \Exception('Treino Diario não existe na base de dados');
        }

        $idTreinoDiario->delete();
    }

    public function dataCreate(TreinoDiario $treinoDiario)
    {
        return [
            'id' => $treinoDiario->getId(),
            'nome' => $treinoDiario->getNome(),
            'slug' => $treinoDiario->getSlug(),
            'ficha_treino_id' => $treinoDiario->getFichaTreinoId(),
            'checkin_id' => $treinoDiario->getCheckinId()
        ];
    }

    public function dataUpdate(TreinoDiario $treinoDiario)
    {
        return [
            'nome' => $treinoDiario->getNome(),
            'slug' => $treinoDiario->getSlug(),
            'ficha_treino_id' => $treinoDiario->getFichaTreinoId(),
            'checkin_id' => $treinoDiario->getCheckinId()
        ];
    }
}