<?php

namespace App\Repositories;

use App\Entities\Carga;
use App\Models\CargaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CargaRepository extends AbstractRepository
{
    public function __construct(private CargaModel $carga)
    {
    }
    protected function getTableName(): string
    {
        return $this->carga->getTable();
    }

    public function findAll(): array
    {
        return $this->carga->all()->map(
            fn(CargaModel $carga) => Carga::factory($carga->toArray())
        )->toArray();
    }

    public function find($id): ?Carga
    {
        $carga = $this->carga->query()->find($id);

        return $carga ? Carga::factory($carga->toArray()) : null;
    }

    public function create(Carga $carga): Carga
    {
        $cargaModel = new CargaModel($this->dataCreate($carga));
        $cargaModel->save();

        return $carga->setId($cargaModel->getKey());
    }

    public function update(Carga $carga): bool
    {
        try {
            $cargaModel = CargaModel::query()->find($carga->getId());
            if (!$cargaModel) {
                throw new \Exception('Carga nao existe na base de dados');
            }

            $cargaModel->fill($this->dataUpdate($carga));
            return $cargaModel->save();
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $cargaModel = CargaModel::query()->find($id);
        if (!$cargaModel){
            throw new \Exception('Carga nao existe na base de dados');
        }

        return $cargaModel->delete();
    }

    public function dataCreate(Carga $carga)
    {
        return [
            'numero_cargas' => $carga->getNumeroCargas(),
        ];
    }

    public function dataUpdate(Carga $carga)
    {
        return [
            'id' => $carga->getId(),
            'numero_cargas' => $carga->getNumeroCargas(),
        ];
    }
}
