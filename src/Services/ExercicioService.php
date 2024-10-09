<?php

namespace App\Services;

use App\Entities\Exercicio;
use App\Repositories\ExercicioRepository;

class ExercicioService
{
    public function __construct(private ExercicioRepository $exercicioRepository)
    {
    }

    public function findAll()
    {
        return $this->exercicioRepository->findAll();
    }

    public function find($id)
    {
        return $this->exercicioRepository->find($id);
    }

    public function create(Exercicio $exercicio)
    {
        return $this->exercicioRepository->create($exercicio);
    }

    public function update(Exercicio $exercicio)
    {
        $this->exercicioRepository->update($exercicio);
    }

    public function delete($id)
    {
        return $this->exercicioRepository->delete($id);
    }
}