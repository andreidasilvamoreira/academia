<?php

namespace App\Repositories;

use App\Entities\Academia;
use App\Models\AcademiaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class AcademiaRepository extends AbstractRepository
{
    public function __construct(private AcademiaModel $academia)
    {
    }

    protected function getTableName(): string
    {
        return $this->academia->getTable();
    }

    public function findAll(): array
    {
        return $this->academia->all()->map(
            fn(AcademiaModel $academia) => Academia::factory($academia->toArray())
        )->toArray();
    }
    public function find($id): ?Academia
    {
        $academia = $this->academia->query()->find($id);

        return $academia ? Academia::factory($academia->toArray()) : null;
    }

    public function create(Academia $academia): Academia
    {
        $academiaModel = new AcademiaModel($this->dataCreate($academia));
        $academiaModel->save();

        return $academia->setId($academiaModel->getKey());
    }

    public function update(Academia $academia): bool
    {
        try {
            $academiaModel = AcademiaModel::query()->find($academia->getId());

            if (!$academiaModel) {
                throw new \Exception('Academia não existe na base de dados');
            }

            $academiaModel->fill($this->dataUpdate($academia));

            return $academiaModel->save();
        } catch (ModelNotFoundException $exception) {
            return false;
        }
    }

    public function dataCreate(Academia $academia)
    {
        return [
            'nome' => $academia->getNome(),
            'telefone' => $academia->getTelefone(),
            'horario_funcionamento_abertura' => $academia->getHorarioFuncionamentoAbertura(),
            'horario_funcionamento_fechamento' => $academia->getHorarioFuncionamentoFechamento(),
            'endereco_id' => $academia->getEnderecoId(),
        ];
    }

    public function dataUpdate(Academia $academia)
    {

        return [
            'id' => $academia->getId(),
            'nome' => $academia->getNome(),
            'telefone' => $academia->getTelefone(),
            'horario_funcionamento_abertura' => $academia->getHorarioFuncionamentoAbertura(),
            'horario_funcionamento_fechamento' => $academia->getHorarioFuncionamentoFechamento(),
            'endereco_id' => $academia->getEnderecoId(),
        ];
    }
}
