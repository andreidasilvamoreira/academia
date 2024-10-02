<?php

namespace App\Repositories;

use App\Entities\Serie;
use App\Models\SerieModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SerieRepository extends AbstractRepository
{
    public function __construct(private SerieModel $serie)
    {
    }

    protected function getTableName(): string
    {
        return $this->serie->getTable();
    }

    public function findAll(): array
    {
        return $this->serie->all()->map(
            fn(SerieModel $serie) => Serie::factory($serie->toArray())
        )->toArray();
    }
    public function find($id): ?Serie
    {
        $serie = $this->serie->query()->find($id);

        return $serie ? Serie::factory($serie->toArray()) : null;
    }

    public function create(Serie $serie)
    {
        $serieModel = $this->serie->query()->create($this->preparaDadosParaCreate($serie));

        return $serie->setId(
            $serieModel->id
        );
    }
/**
 * @param Serie $serie
 * @return bool
 */

    public function update(Serie $serie): bool
    {
        try {
            $serieModel = SerieModel::query()->find($serie->getId());

            if (!$serieModel) {
                throw new \Exception('Serie não existe na base de dados');
            }

            $serieModel->fill($this->preparaDadosParaUpdate($serie));

            return $serieModel->save();
        } catch (ModelNotFoundException $exception) {
            return false;
        }
    }

    public function preparaDadosParaCreate(Serie $serie): array
    {
        return [
            'repeticoes_id' => $serie->getRepeticoesId(),
            'exercicio_id' => $serie->getExercicioId(),
            'carga_id' => $serie->getCargaId()
        ];
    }
    public function preparaDadosParaUpdate(Serie $serie): array
    {
        return [
            'repeticoes_id' => $serie->getRepeticoesId(),
            'exercicio_id' => $serie->getExercicioId(),
            'carga_id' => $serie->getCargaId()
        ];
    }
}