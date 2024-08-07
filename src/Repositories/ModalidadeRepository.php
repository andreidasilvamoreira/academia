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
    public function find($id): ?Modalidade
    {
        $modalidade = $this->modalidade->query()->find($id);

        return $modalidade ? Modalidade::factory($modalidade->toArray()) : null;
    }

    public function create(Modalidade $modalidade): Modalidade
    {
        $modalidadeModel = new ModalidadeModel($this->dataCreate($modalidade));
        $modalidadeModel->save();

        return $modalidade->setId($modalidadeModel->getKey());
    }

    public function update(Modalidade $modalidade): bool
    {
        try {
            $modalidadeModel = ModalidadeModel::query()->find($modalidade->getId());
            if (!$modalidadeModel) {
                throw new \Exception('Modalidade nao existe na base de dados');
            }

            $modalidadeModel->fill($this->dataUpdate($modalidade));
            return $modalidadeModel->save();
        } catch (ModelNotFoundException) {
            return false;
        }
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
