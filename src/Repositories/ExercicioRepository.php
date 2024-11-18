<?php

namespace App\Repositories;

use App\Entities\Exercicio;
use App\Models\ExercicioModel;
use App\Models\ModalidadeModel;
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

    public function findAllWithModalidade()
    {
        $exercicios = $this->exercicioModel
            ->with(['modalidades'])
            ->whereHas('modalidades')
            ->get();

        $exercicioModel = $exercicios->map(function (ExercicioModel $exercicio) {
        $modalidade = $exercicio->modalidades->map(function ($modalidade) {

            return $modalidade->makeHidden(['pivot']);
        });

                return [
                    'id' => $exercicio->id,
                    'nome' => $exercicio->nome,
                    'musculatura_alvo' => $exercicio->musculatura_alvo,
                    'dificuldade' => $exercicio->dificuldade,
                    'quantidade_series' =>$exercicio->quantidade_series,
                    'descricao' => $exercicio->descricao,
                    'concluido' => $exercicio->concluido,
                    'equipamentos_necessarios'=> $exercicio->equipamentos_necessarios,
                    'modalidades' => $modalidade
                ];
            })->toArray();

        return $exercicioModel;
    }

    public function findAllWithTreinoDiario()
    {
        $exercicios = $this->exercicioModel
            ->with(['treinoDiario'])
            ->whereHas('treinoDiario')
            ->get();

        $exercicioModel = $exercicios->map(function (ExercicioModel $exercicio) {
        $treinoDiario = $exercicio->treinoDiario->map(function ($treinoDiario) {

            return $treinoDiario->makeHidden(['pivot']);
        });

                return [
                    'id' => $exercicio->id,
                    'nome' => $exercicio->nome,
                    'musculatura_alvo' => $exercicio->musculatura_alvo,
                    'dificuldade' => $exercicio->dificuldade,
                    'quantidade_series' =>$exercicio->quantidade_series,
                    'descricao' => $exercicio->descricao,
                    'concluido' => $exercicio->concluido,
                    'equipamentos_necessarios'=> $exercicio->equipamentos_necessarios,
                    'treinoDiario' => $treinoDiario
                ];
            })->toArray();

        return $exercicioModel;
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