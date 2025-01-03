<?php

namespace App\Services;

use App\Entities\Exercicio;
use App\Repositories\ExercicioRepository;

class ExercicioService
{
    public function __construct(private ExercicioRepository $exercicioRepository)
    {
    }

    public function findAllWithModalidade()
    {
        return $this->exercicioRepository->findAllWithModalidade();
    }

    public function findAllWithTreinoDiario()
    {
        return $this->exercicioRepository->findAllWithTreinoDiario();
    }

    public function FindDinamicWith($id, $withs = [])
    {
        return $this->exercicioRepository->FindDinamicWith($id, $withs);
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