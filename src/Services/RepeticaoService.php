<?php

namespace App\Services;

use App\Entities\Repeticao;
use App\Repositories\RepeticaoRepository;

class RepeticaoService
{
    public function __construct(private RepeticaoRepository $repeticaoRepository)
    {
    }

    public function findAll()
    {
        return $this->repeticaoRepository->findAll();
    }

    public function find($id)
    {
        return $this->repeticaoRepository->find($id);
    }

    public function create(Repeticao $repeticao)
    {
        return $this->repeticaoRepository->create($repeticao);
    }

    public function update(Repeticao $repeticao)
    {
        return $this->repeticaoRepository->update($repeticao);
    }

    public function delete($id)
    {
        return $this->repeticaoRepository->delete($id);
    }
}