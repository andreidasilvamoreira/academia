<?php

namespace App\Repositories;

use App\Entities\Academia;
use App\Models\AcademiaModel;
use http\Env\Response;
use http\Message;
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
        $academias = $this->academia
            ->with(['modalidades.modalidade'])
            ->get();

        $academiasArray = $academias->map(function (AcademiaModel $academia) {
            $modalidades = $academia->modalidades->map(function ($modalidade) {

                return $modalidade->makeHidden(['academia_id', 'modalidade_id']);
            });

            return [
                'id' => $academia->id,
                'nome' => $academia->nome,
                'telefone' => $academia->telefone,
                'modalidades' => $modalidades,
            ];
        })->toArray();

        return $academiasArray;
    }
    public function find($id): ?AcademiaModel
    {
        $academia = $this->academia
            ->with(['modalidades.modalidade'])
            ->find($id);
        if ($academia) {
            foreach ($academia->modalidades as $modalidade) {
                    $modalidade->makeHidden(['academia_id', 'modalidade_id']);
            }
        }

        return $academia;
    }

    public function create(Academia $academia): Academia
    {
        $academiaModel = new AcademiaModel($this->dataCreate($academia));
        $academiaModel->save();

        return $academia->setId($academiaModel->getKey());
    }

    public function update(Academia $academia)
    {
        try {
            $academiaModel = AcademiaModel::query()->find($academia->getId());

            if (!$academiaModel) {
                throw new \Exception('Academia não existe na base de dados');
            }

            $academiaModel->fill($this->dataUpdate($academia));
            $academiaModel->save();

            return $academiaModel;
        } catch (ModelNotFoundException $exception) {
            return false;
        }
    }

    public function delete(int $id)
    {
        $academiaModel = AcademiaModel::query()->find($id);

        if (!$academiaModel){
            throw new \Exception('Academia não existe na base de dados');
        }

        return $academiaModel->delete();

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
