<?php

namespace App\Repositories;

use App\Entities\FichaTreino;
use App\Models\FichaTreinoModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class FichaPessoaRepository extends AbstractRepository
{
    public function __construct(private FichaTreinoModel $fichaTreinoModel)
    {
    }
    protected function getTableName(): string
    {
        return $this->fichaTreinoModel->getTable();
    }

    public function findAll()
    {
        return $this->fichaTreinoModel->all()->map(
            fn(FichaTreinoModel $fichaTreinoModel) => FichaTreino::factory($fichaTreinoModel->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $fichaTreinoModel = FichaTreinoModel::query()->find($id);

        return $fichaTreinoModel ? FichaTreino::factory($fichaTreinoModel->toArray()): null;
    }

    public function create(FichaTreino $fichaTreino)
    {
        $fichaTreinoModel = new FichaTreinoModel($this->dataCreate($fichaTreino));
        $fichaTreinoModel->save();

        return $fichaTreino->setId($fichaTreinoModel->getKey());
    }

    public function update(FichaTreino $fichaTreino)
    {
        try {
            $fichaTreinoModel = FichaTreinoModel::query()->find($fichaTreino->getId());

            if (!$fichaTreinoModel) {
                throw new \Exception('FichaTreino não existe na base de dados');
            }

            $fichaTreinoModel->fill($this->dataUpdate($fichaTreino));
            $fichaTreinoModel->save();

            return $fichaTreinoModel;
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $fichaTreinoModel = FichaTreinoModel::query()->find($id);

        if (!$fichaTreinoModel) {
            throw new \Exception('Não existe uma FichaTreino na base de dados');
        }

        return $fichaTreinoModel->delete();
    }

    public function dataCreate(FichaTreino $fichaTreino)
    {
        return [
            'objetivos' => $fichaTreino->getObjetivo(),
            'experiencia' => $fichaTreino->getExperiencia(),
            'recomendacoes_medicas' => $fichaTreino->getRecomendacoesMedicas(),
            'condicoes_medicas' => $fichaTreino->getCondicoesMedicas(),
            'treinador_responsavel_id' => $fichaTreino->getTreinadorResponsavelId(),
            'objetivo' => $fichaTreino->getObjetivo(),
            'academia_id' => $fichaTreino->getAcademiaId(),
            'tempo_ficha_id' => $fichaTreino->getTempoFichaId()
        ];
    }

    public function dataUpdate(FichaTreino $fichaTreino)
    {
        return [
            'id' => $fichaTreino->getId(),
            'objetivos' => $fichaTreino->getObjetivo(),
            'experiencia' => $fichaTreino->getExperiencia(),
            'recomendacoes_medicas' => $fichaTreino->getRecomendacoesMedicas(),
            'condicoes_medicas' => $fichaTreino->getCondicoesMedicas(),
            'treinador_responsavel_id' => $fichaTreino->getTreinadorResponsavelId(),
            'objetivo' => $fichaTreino->getObjetivo(),
            'academia_id' => $fichaTreino->getAcademiaId(),
            'tempo_ficha_id' => $fichaTreino->getTempoFichaId()
        ];
    }
}