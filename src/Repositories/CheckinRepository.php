<?php

namespace App\Repositories;

use App\Entities\Checkin;
use App\Models\CheckinModel;
use App\Services\CheckinService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CheckinRepository extends AbstractRepository
{
    public function __construct(private CheckinModel $checkin)
    {
    }

    protected function getTableName(): string
    {
        return $this->checkin->getTable();
    }

    public function findAll(): array
    {
        return $this->checkin->all()->map(
            fn(CheckinModel $checkin) => Checkin::factory($checkin->toArray())
        )->toArray();
    }

    public function find($id): ?Checkin
    {
        $checkin = $this->checkin->query()->find($id);

        return $checkin ? Checkin::factory($checkin->toArray()) : null;
    }

    public function create(Checkin $checkin): Checkin
    {
        $checkinModel = new CheckinModel($this->dataCreate($checkin));
        $checkinModel->save();

        return $checkin->setId($checkinModel->getKey());
    }

    public function update(Checkin $checkin): bool
    {
        try {
            $checkinModel = CheckinModel::query()->find($checkin->getId());

            if (!$checkinModel) {
                throw new \Exception('Checkin não existe na base de dados');
            }
            $checkinModel->fill($this->dataUpdate($checkin));
            return $checkinModel->save();
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete($id)
    {
        $checkinModel = CheckinModel::query()->find($id);

        if (!$checkinModel) {
            throw new \Exception('Checkin nao existe na base de dados');
        }

        return $checkinModel->delete();
    }

    public function dataCreate(Checkin $checkin)
    {
        return [
            'data_check_in' => $checkin->getDataCheckIn(),
            'duracao_treino' => $checkin->getDuracaoTreino(),
            'motivos_status' => $checkin->getMotivosStatus(),
            'pessoa_id' => $checkin->getPessoaId(),
            'status_id' => $checkin->getStatusId(),
        ];
    }

    public function dataUpdate(Checkin $checkin)
    {
        return [
            'id' => $checkin->getId(),
            'data_check_in' => $checkin->getDataCheckIn(),
            'duracao_treino' => $checkin->getDuracaoTreino(),
            'motivos_status' => $checkin->getMotivosStatus(),
            'pessoa_id' => $checkin->getPessoaId(),
            'status_id' => $checkin->getStatusId(),
        ];
    }
}
