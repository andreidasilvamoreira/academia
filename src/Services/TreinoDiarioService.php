<?php

namespace App\Services;

use App\Entities\TreinoDiario;
use App\Repositories\TreinoDiarioRepository;

class TreinoDiarioService
{
    public function __construct(private TreinoDiarioRepository $treinoDiarioRepository)
    {
    }

    public function findAll()
    {
        return $this->treinoDiarioRepository->findAll();
    }

    public function findWithExercicio($id)
    {
        return $this->treinoDiarioRepository->findWithExercicio($id);
    }

    public function create(TreinoDiario $treinoDiario)
    {
        return $this->treinoDiarioRepository->create($treinoDiario);
    }

    public function update(TreinoDiario $treinoDiario)
    {
        return $this->treinoDiarioRepository->update($treinoDiario);
    }

    public function delete($id)
    {
        return $this->treinoDiarioRepository->delete($id);
    }
}