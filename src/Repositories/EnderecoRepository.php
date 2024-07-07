<?php

namespace App\Repositories;

use _PHPStan_11268e5ee\Nette\Neon\Exception;
use App\Entities\Endereco;
use App\Models\EnderecoModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
        $endereco = $this->endereco->query()->find($id);

        return $endereco ? Endereco::factory($endereco->toArray()) : null;
    }

    public function create(Endereco $endereco): Endereco
    {
        $enderecoModel = new EnderecoModel($this->dataCreate($endereco));
        $enderecoModel->save();

        return $endereco->setId($enderecoModel->getKey());
    }

    public function update(Endereco $endereco): bool
    {
        try {
            $enderecoModel = EnderecoModel::query()->find($endereco->getId());

            if (!$enderecoModel) {
                throw new Exception('Endereço não existe na base de dados');
            }

            $enderecoModel->fill($this->dataUpdate($endereco));
            return $enderecoModel->save();
        } catch (ModelNotFoundException) {
            return false;
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
