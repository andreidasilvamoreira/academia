<?php

namespace App\Repositories;

use App\Entities\Pessoa;
use App\Models\PessoaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PessoaRepository extends AbstractRepository
{
    public function __construct(private PessoaModel $pessoa)
    {
    }

    protected function getTableName(): string
    {
        return $this->pessoa->getTable();
    }

    public function findAll(): array
    {
        return $this->pessoa->all()->map(
            fn(PessoaModel $pessoa) => Pessoa::factory($pessoa->toArray())
        )->toArray();
    }
    public function findWithTipoPessoa($id)
    {
        $pessoa = $this->pessoa
            ->with(['tipoPessoa'])
            ->find($id);

        if ($pessoa) {
            foreach ($pessoa->tipoPessoa as $tipoPessoa){
                $tipoPessoa->MakeHidden(['pivot']);
            }
        }

        return $pessoa;
    }

    public function findWithAcademia($id)
    {
        $pessoa = $this->pessoa
            ->with(['academia'])
            ->find($id);

        if ($pessoa) {
            foreach ($pessoa->academia as $academia){
                $academia->MakeHidden(['pivot']);
            }
        }

        return $pessoa;
    }

    public function create(Pessoa $pessoa): Pessoa
    {
        $pessoaModel = $this->pessoa->query()->create($this->dataCreate($pessoa));

        return $pessoa->setId(
            $pessoaModel->id
        );
    }


    public function update(Pessoa $pessoa)
    {
        try {
            $pessoaModel = PessoaModel::query()->find($pessoa->getId());
            if (!$pessoaModel) {
                throw new \Exception('Repetição não existe na base de dados');
            }

            $pessoaModel->fill($this->dataCreate($pessoa));
            $pessoaModel->save();

            return $pessoaModel;
        } catch (ModelNotFoundException) {

        }
    }

    public function delete(int $id)
    {

        $pessoaModel = PessoaModel::query()->find($id);
        if (!$pessoaModel) {
            throw new \Exception('Pessoa não existe na base de dados');
        }

        return $pessoaModel->delete();
    }

    public function dataCreate(Pessoa $pessoa): array
    {
        return [
            'endereco_id' => $pessoa->getEnderecoId(),
            'nome' => $pessoa->getNome(),
            'cpf' => $pessoa->getCpf(),
            'altura' => $pessoa->getAltura(),
            'peso' => $pessoa->getPeso(),
            'data_matricula' => $pessoa->getDataMatricula(),
            'data_nascimento' => $pessoa->getDataNascimento(),
            'senha' => $pessoa->getSenha(),
            'email' => $pessoa->getEmail()
        ];
    }

    public function dataUpdate(Pessoa $pessoa): array
    {
        return [
            'endereco_id' => $pessoa->getEnderecoId(),
            'nome' => $pessoa->getNome(),
            'cpf' => $pessoa->getCpf(),
            'altura' => $pessoa->getAltura(),
            'peso' => $pessoa->getPeso(),
            'data_matricula' => $pessoa->getDataMatricula(),
            'data_nascimento' => $pessoa->getDataNascimento(),
            'senha' => $pessoa->getSenha(),
            'email' => $pessoa->getEmail()
        ];
    }
}
