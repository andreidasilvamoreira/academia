<?php

namespace App\Repositories;

use App\Entities\Status;
use App\Models\StatusModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class Statusrepository extends AbstractRepository
{
    public function __construct(private StatusModel $statusModel)
    {

    }
    protected function getTableName(): string
    {
        return $this->statusModel->getTable();
    }

    public function findAll()
    {
        return $this->statusModel->all()->map(
            fn(StatusModel $statusModel) => Status::factory($statusModel->toArray())
        )->toArray();
    }

    public function find($id)
    {
        $status = $this->statusModel->query()->find($id);

        return $status ? Status::factory($status->toArray()): null;
    }

    public function create(Status $status)
    {
        $statusModel = StatusModel::query()->create($this->dataCreate($status));
        return $status->setId(
            $statusModel->id
        );
    }

    public function update(Status $status)
    {
        try {
        $statusModel = StatusModel::query()->find($status->getId());
            if (!$statusModel) {
                throw new \Exception('Status não existe na base de dados');
            }

            $statusModel->fill($this->dataCreate($status));
            return $statusModel->save();
            } catch (ModelNotFoundException) {
        }
    }

    public function delete($id)
    {
        $statusModel = StatusModel::query()->find($id);
        if (!$statusModel) {
            throw new \Exception('Status não existe na base de dados');
        }

        return $statusModel->delete();
    }

    public function dataCreate(Status $status)
    {
        return [
            'nome' => $status->getNome(),
            'slug' => $status->getSlug()
        ];
    }

    public function dataUpdate(Status $status)
    {
        return [
            'id'=> $status->getId(),
            'nome' => $status->getNome(),
            'slug' => $status->getSlug()
        ];
    }
}