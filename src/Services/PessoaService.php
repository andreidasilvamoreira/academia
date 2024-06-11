<?php

namespace App\Services;

use App\Entities\Pessoa;
use App\Repositories\PessoaRepository;

class PessoaService
{

    public function __construct(private PessoaRepository $pessoaRepository)
    {
    }

    public function findAll()
    {
        return $this->pessoaRepository->findAll();
    }
    public function find($id)
    {
        return $this->pessoaRepository->find($id);
    }

    public function create(Pessoa $pessoa)
    {
        return $this->pessoaRepository->create($pessoa);
    }

    public function update(Pessoa $pessoa)
    {
        $this->pessoaRepository->update($pessoa);
    }

}