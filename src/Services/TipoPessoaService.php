<?php

namespace App\Services;

use App\Entities\TipoPessoa;
use App\Repositories\TipoPessoaRepository;

class TipoPessoaService
{
    public function __construct(private TipoPessoaRepository $tipoPessoaRepository)
    {
    }
    public function findAll()
    {
        return $this->tipoPessoaRepository->findAll();
    }

    public function find($id)
    {
        return $this->tipoPessoaRepository->find($id);
    }

    public function create(TipoPessoa $tipoPessoa)
    {
        return $this->tipoPessoaRepository->create($tipoPessoa);
    }

    public function update(TipoPessoa $tipoPessoa)
    {
        $this->tipoPessoaRepository->update($tipoPessoa);
    }

    public function delete($id)
    {
        return $this->tipoPessoaRepository->delete($id);
    }
}