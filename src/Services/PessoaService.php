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
    public function findWithTipoPessoa($id)
    {
        return $this->pessoaRepository->findWithTipoPessoa($id);
    }

    public function findWithAcademia($id)
    {
        return $this->pessoaRepository->findWithAcademia($id);
    }


    public function create(Pessoa $pessoa)
    {
        return $this->pessoaRepository->create($pessoa);
    }

    public function update(Pessoa $pessoa)
    {
        return $this->pessoaRepository->update($pessoa);
    }
    public function delete($id)
    {
        return $this->pessoaRepository->delete($id);
    }
}
