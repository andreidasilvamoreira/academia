<?php

namespace App\Repositories;

use App\Entities\Exercicio;
use App\Models\ExercicioModel;
use App\Repositories\AbstractRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ExercicioRepository extends AbstractRepository
{

    public function __construct(private ExercicioModel $exercicioModel)
    {

    }
    protected function getTableName(): string
    {
        return $this->exercicioModel->getTable();
    }

    public function findAll()
    {
        return $this->exercicioModel->all()->map(
            fn(ExercicioModel $exercicioModel) => Exercicio::factory($exercicioModel->toArray())
        )->toArray();
    }

    public function findWithModalidade($id)
    {
        $exercicio = $this->exercicioModel
            ->with(['modalidades'])
            ->find($id);
        if ($exercicio) {
            foreach ($exercicio->modalidades as $modalidade) {
                $modalidade->makeHidden(['pivot']);
            }
        }

        return $exercicio;
    }

    public function findWithTreinoDiario($id)
    {
        $exercicio = $this->exercicioModel
            ->with(['treinoDiario'])
            ->find($id);

        if ($exercicio) {
            foreach ($exercicio->treinoDiario as $treinoDiario) {
                $treinoDiario->makeHidden(['pivot']);
            }
        }

        return $exercicio;
    }

    public function create(Exercicio $exercicio)
    {
        $exercicioModel = new ExercicioModel($this->dataCreate($exercicio));
        $exercicioModel->save();

        return $exercicio->setId($exercicioModel->getKey());
    }

    public function update(Exercicio $exercicio)
    {
        try {
            $exercicioModel = ExercicioModel::query()->find($exercicio->getId());

            if (!$exercicioModel) {
                throw new \Exception('Exercicio nao existe na base de dados');
            }

            $exercicioModel->fill($this->dataUpdate($exercicio));
            $exercicioModel->save();

            return $exercicioModel;
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $exercicioModel = ExercicioModel::query()->find($id);

        if (!$exercicioModel) {
            throw new \Exception('Exercicio nao existe na base de dados');
        }

        return $exercicioModel->delete();
    }

    public function dataCreate(Exercicio $exercicio)
    {
        return [
            'nome'=> $exercicio->getNome(),
            'musculatura_alvo' => $exercicio->getMusculaturaAlvo(),
            'dificuldade' => $exercicio->getDificuldade(),
            'quantidade_series' => $exercicio->getQuantidadeSeries(),
            'descricao' => $exercicio->getDescricao(),
            'concluido' => $exercicio->getConcluido(),
            'equipamentos_necessarios' => $exercicio->getEquipamentosNecessarios(),
            'material_apoio_id' => $exercicio->getMaterialApoioId(),
        ];
    }

    public function dataUpdate(Exercicio $exercicio)
    {
        return [
            'id' => $exercicio->getId(),
            'nome'=> $exercicio->getNome(),
            'musculatura_alvo' => $exercicio->getMusculaturaAlvo(),
            'dificuldade' => $exercicio->getDificuldade(),
            'quantidade_series' => $exercicio->getQuantidadeSeries(),
            'descricao' => $exercicio->getDescricao(),
            'concluido' => $exercicio->getConcluido(),
            'equipamentos_necessarios' => $exercicio->getEquipamentosNecessarios(),
            'material_apoio_id' => $exercicio->getMaterialApoioId(),

        ];
    }
}