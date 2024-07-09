<?php

namespace App\Services;

use App\Entities\Carga;
use App\Repositories\CargaRepository;

class CargaService
{
    public function __construct(private CargaRepository $cargaRepository)
    {
    }
    public function findAll()
    {
        return $this->cargaRepository->findAll();
    }
    public function find($id)
    {
        return $this->cargaRepository->find($id);
    }
    public function create(Carga $carga)
    {
        return $this->cargaRepository->create($carga);
    }
    public function update(Carga $carga)
    {
        $this->cargaRepository->update($carga);
    }
}