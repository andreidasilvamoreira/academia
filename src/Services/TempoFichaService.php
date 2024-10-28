<?php

namespace App\Services;

use App\Entities\TempoFicha;
use App\Repositories\TempoFichaRepository;

class TempoFichaService
{
    public function __construct(private TempoFichaRepository $tempoFichaRepository)
    {
    }

    public function findAll()
    {
        return $this->tempoFichaRepository->findAll();
    }

    public function find($id)
    {
        return $this->tempoFichaRepository->find($id);
    }

    public function create(TempoFicha $tempoFicha)
    {
        return $this->tempoFichaRepository->create($tempoFicha);
    }

    public function update(TempoFicha $tempoFicha)
    {
        return $this->tempoFichaRepository->update($tempoFicha);
    }

    public function delete($id)
    {
        return $this->tempoFichaRepository->delete($id);
    }
}