<?php

namespace App\Services;

use App\Entities\FichaTreino;
use App\Repositories\FichaPessoaRepository;

class FichaTreinoService
{
    public function __construct(private FichaPessoaRepository $fichaPessoaRepository)
    {
    }

    public function findAll()
    {
        return $this->fichaPessoaRepository->findAll();
    }

    public function find($id)
    {
        return $this->fichaPessoaRepository->find($id);
    }

    public function create(FichaTreino $fichaTreino)
    {
        return $this->fichaPessoaRepository->create($fichaTreino);
    }

    public function update(FichaTreino $fichaTreino)
    {
        $this->fichaPessoaRepository->update($fichaTreino);
    }

    public function delete($id)
    {
        return $this->fichaPessoaRepository->delete($id);
    }
}