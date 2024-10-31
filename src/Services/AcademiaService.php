<?php

namespace App\Services;

use App\Entities\Academia;
use App\Repositories\AcademiaRepository;

class AcademiaService
{

    public function __construct(private AcademiaRepository $academiaRepository)
    {
    }

    public function findAll()
    {
        return $this->academiaRepository->findAll();
    }
    public function find($id)
    {
        return $this->academiaRepository->find($id);
    }

    public function create(Academia $academia)
    {
        return $this->academiaRepository->create($academia);
    }

    public function update(Academia $academia)
    {
        return $this->academiaRepository->update($academia);
    }

    public function delete($id)
    {
        return $this->academiaRepository->delete($id);
    }
}