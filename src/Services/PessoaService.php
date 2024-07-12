<?php

namespace App\Services;

use App\Entities\Pessoa;
use App\Repositories\PessoaRepository;
use Illuminate\Support\Facades\DB;

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
        try {
            $this->pessoaRepository->initTransaction();

            $this->pessoaRepository->update($pessoa);

            $this->pessoaRepository->commitTransaction();
        } catch (\Exception $e) {
            $this->pessoaRepository->rollBackTransaction();
        }
    }
}
