<?php

namespace App\Services;

use App\Entities\Endereco;
use App\Repositories\EnderecoRepository;

class EnderecoService
{

    public function __construct(private EnderecoRepository $enderecoRepository)
    {
    }
    public function findAll()
    {
        return $this->enderecoRepository->findAll();
    }
    public function find($id)
    {
        return $this->enderecoRepository->find($id);
    }
    public function create(Endereco $endereco)
    {
        return $this->enderecoRepository->create($endereco);
    }
    public function update(Endereco $endereco)
    {
        $this->enderecoRepository->update($endereco);
    }
}