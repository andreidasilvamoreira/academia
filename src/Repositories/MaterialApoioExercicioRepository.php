<?php

namespace App\Repositories;

use App\Entities\MaterialApoioExercicio;
use App\Models\MaterialApoioExercicioModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MaterialApoioExercicioRepository extends AbstractRepository
{
    public function __construct(private MaterialApoioExercicioModel $materialApoioExercicioModel)
    {
    }
    protected function getTableName(): string
    {
        return $this->materialApoioExercicioModel->getTable();
    }

    public function findAll()
    {
        return $this->materialApoioExercicioModel->all()->map(
            fn(MaterialApoioExercicioModel $materialApoioExercicioModel) => MaterialApoioExercicio::factory($materialApoioExercicioModel->toArray())
        )->toArray();
    }

    public function find(int $id)
    {
        $materialApoioExercicioModel = MaterialApoioExercicioModel::query()->find($id);

        return $materialApoioExercicioModel ? MaterialApoioExercicio::factory($materialApoioExercicioModel->toArray()): null;
    }

    public function create(MaterialApoioExercicio $materialApoioExercicio)
    {
        $materialApoioExercicioModel = new MaterialApoioExercicioModel($this->dataCreate($materialApoioExercicio));
        $materialApoioExercicioModel->save();

        return $materialApoioExercicio->setId($materialApoioExercicioModel->getKey());
    }

    public function update(MaterialApoioExercicio $materialApoioExercicio)
    {
        try {
            $materialApoioExercicioModel = MaterialApoioExercicioModel::query()->find($materialApoioExercicio->getId());

            if (!$materialApoioExercicioModel) {
                throw new \Exception('Material de apoio não existe na base de dados');
            }

            $materialApoioExercicioModel->fill($this->dataUpdate($materialApoioExercicio));
            $materialApoioExercicioModel->save();

            return $materialApoioExercicioModel;
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $materialApoioExercicioModel = MaterialApoioExercicioModel::query()->find($id);

        if (!$materialApoioExercicioModel) {
            throw new \Exception('Não existe um Material de Apoio na base de dados');
        }

        return $materialApoioExercicioModel->delete();
    }

    public function dataCreate(MaterialApoioExercicio $materialApoioExercicio)
    {
        return [
            'titulo' => $materialApoioExercicio->getTitulo(),
            'tipo' => $materialApoioExercicio->getTipo(),
            'url' => $materialApoioExercicio->getUrl()
        ];
    }

    public function dataUpdate(MaterialApoioExercicio $materialApoioExercicio)
    {
        return [
            'id' => $materialApoioExercicio->getId(),
            'titulo' => $materialApoioExercicio->getTitulo(),
            'tipo' => $materialApoioExercicio->getTipo(),
            'url' => $materialApoioExercicio->getUrl()
        ];
    }
}
