<?php

namespace App\Repositories;

use App\Entities\Pessoa;
use App\Models\PessoaModel;

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
    public function find($id): ?Pessoa
    {
        $pessoa = $this->pessoa->query()->find($id);

        return $pessoa ? Pessoa::factory($pessoa->toArray()) : null;
    }

    public function create(Pessoa $pessoa): Pessoa
    {
        $pessoaModel = $this->pessoa->query()->create($this->preparaDadosParaCreate($pessoa));

        return $pessoa->setId(
            $pessoaModel->id
        );
    }


    /**
     * @param Pessoa $pessoa
     * @return bool
     */
    public function update(Pessoa $pessoa): bool
    {
        $pessoaModel = $this->pessoa->query()->findOrFail($pessoa->getId());

        if ($pessoaModel) {
            $pessoaUpdate = $this->pessoa->query()->update($this->preparaDadosParaUpdate($pessoa));

            if ($pessoaUpdate) {
                return true;
            } else {
                return false;
            }
        }

        return false;
    }

    public function delete(int $id)
    {
        $pessoaModel = PessoaModel::query()->find($id);

        if (!$pessoaModel) {
            throw new \Exception('Pessoa não existe na base de dados');
        }

        return $pessoaModel->delete();
    }

    public function preparaDadosParaCreate(Pessoa $pessoa): array
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
            'email' => $pessoa->getEmail(),
            'created_at' => $pessoa->getCreatedAt(),
            'updated_at' => $pessoa->getUpdatedAt()
        ];
    }

    public function preparaDadosParaUpdate(Pessoa $pessoa): array
    {
        return [
            'id' => $pessoa->getId(),
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
