<?php

namespace App\Repositories;

use App\Entities\Modalidade;
use App\Models\ModalidadeModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ModalidadeRepository extends AbstractRepository
{
    public function __construct(private ModalidadeModel $modalidade)
    {
    }

    protected function getTableName(): string
    {
        return $this->modalidade->getTable();
    }
    public function findAll(): array
    {
        return $this->modalidade->all()->map(
            fn(ModalidadeModel $modalidade) => Modalidade::factory($modalidade->toArray())
        )->toArray();
    }
    public function find($id): ?ModalidadeModel
    {
        $modalidade = $this->modalidade
            ->with(['academias.academia'])
            ->find($id);

        if ($modalidade) {
            foreach ($modalidade->academias as $academia){
                $academia->makeHidden(['academia_id', 'modalidade_id']);
            }
        }

        return $modalidade;
    }

    public function create(Modalidade $modalidade): Modalidade
    {
        $modalidadeModel = new ModalidadeModel($this->dataCreate($modalidade));
        $modalidadeModel->save();

        return $modalidade->setId($modalidadeModel->getKey());
    }

    public function update(Modalidade $modalidade)
    {
        try {
            $modalidadeModel = ModalidadeModel::query()->find($modalidade->getId());
            if (!$modalidadeModel) {
                throw new \Exception('Modalidade nao existe na base de dados');
            }

            $modalidadeModel->fill($this->dataUpdate($modalidade));
            $modalidadeModel->save();

            return $modalidadeModel;
        } catch (ModelNotFoundException) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $modalidadeModel = ModalidadeModel::query()->find($id);

        if(!$modalidadeModel) {
            throw new \Exception('Modalidade nao existe na base de dados');
        }

        return $modalidadeModel->delete();
    }

    public function dataCreate(Modalidade $modalidade)
    {
        return[
            'nome' => $modalidade->getNome(),
            'slug' => $modalidade->getSlug(),
            'descricao' => $modalidade->getDescricao(),
            'objetivo' => $modalidade->getObjetivo(),
        ];
    }

    public function dataUpdate(Modalidade $modalidade)
    {
        return [
            'id' => $modalidade->getId(),
            'nome' => $modalidade->getNome(),
            'slug' => $modalidade->getSlug(),
            'descricao' => $modalidade->getDescricao(),
            'objetivo' => $modalidade->getObjetivo(),
        ];
    }
}
