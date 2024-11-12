<?php

namespace App\Services;

use App\Entities\Modalidade;
use App\Repositories\ModalidadeRepository;

class ModalidadeService
{
    public function __construct(private ModalidadeRepository $modalidadeRepository)
    {
    }
    public function findAll()
    {
        return $this->modalidadeRepository->findAll();
    }
    public function findWithAcademia($id)
    {
        return $this->modalidadeRepository->findWithAcademia($id);
    }

    public function findWithExercicio($id)
    {
        return $this->modalidadeRepository->findWithExercicio($id);
    }

    public function create(Modalidade $modalidade)
    {
        return $this->modalidadeRepository->create($modalidade);
    }
    public function update(Modalidade $modalidade)
    {
        $this->modalidadeRepository->update($modalidade);
    }

    public function delete($id)
    {
        return $this->modalidadeRepository->delete($id);
    }
}