<?php

namespace App\Repositories;

use App\Domain\User\UserNotFoundException;
use App\Entities\Endereco;
use App\Models\EnderecoModel;

class EnderecoRepository extends AbstractRepository
{

    public function __construct(private EnderecoModel $endereco)
    {
    }

    protected function getTableName(): string
    {
        return $this->endereco->getTable();
    }

    public function findAll(): array
    {
        return $this->endereco->all()->map(
            fn(EnderecoModel $endereco) => Endereco::factory($endereco->toArray())
        )->toArray();
    }
    public function find($id): ?Endereco
    {
        $endereco = $this->endereco->find($id);

        return $endereco ? Endereco::factory($endereco->toArray()) : null;
    }

    public function create(Endereco $endereco): Endereco
    {
        $pessoaModel = $this->endereco->query()->create($this->dataCreate($endereco));

        return $endereco->setId(
            $pessoaModel->id
        );
    }

    public function update(Endereco $endereco)
    {
        $pessoaModel = $this->endereco->query()->findOrFail($endereco->getId());

        if ($pessoaModel) {
            $pessoaUpdate = $this->endereco->query()->update($this->dataUpdate($endereco));
            if ($pessoaUpdate){
                return true;
            } else {
                return false;
            }
        }
    }



    public function dataCreate(Endereco $endereco)
    {
        return [
            'bairro' => $endereco->getBairro(),
            'CEP' => $endereco->getCEP(),
            'cidade' => $endereco->getCidade(),
            'complemento' => $endereco->getComplemento(),
            'rua' => $endereco->getRua(),
        ];
    }

    public function dataUpdate(Endereco $endereco)
    {

        return [
            'id' => $endereco->getId(),
            'bairro' => $endereco->getBairro(),
            'CEP' => $endereco->getCEP(),
            'cidade' => $endereco->getCidade(),
            'complemento' => $endereco->getComplemento(),
            'rua' => $endereco->getRua(),
        ];
    }

}
