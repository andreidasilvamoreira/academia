<?php

namespace App\Services;

use App\Entities\MaterialApoioExercicio;
use App\Repositories\MaterialApoioExercicioRepository;

class MaterialApoioExercicioService
{
    public function __construct(private MaterialApoioExercicioRepository $materialApoioExercicioRepository)
    {
    }

    public function findAll()
    {
        return $this->materialApoioExercicioRepository->FindAll();
    }

    public function find($id)
    {
        return $this->materialApoioExercicioRepository->find($id);
    }

    public function create(MaterialApoioExercicio $materialApoioExercicio)
    {
        return $this->materialApoioExercicioRepository->create($materialApoioExercicio);
    }

    public function update(MaterialApoioExercicio $materialApoioExercicio)
    {
        return $this->materialApoioExercicioRepository->update($materialApoioExercicio);
    }

    public function delete($id)
    {
        return $this->materialApoioExercicioRepository->delete($id);
    }
}