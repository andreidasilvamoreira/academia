<?php

namespace App\Services;

use App\Repositories\PessoaRepository;

class PessoaService
{

    public function __construct(private PessoaRepository $pessoaRepository)
    {
    }

    public function findAll()
    {
        return $this->pessoaRepository->findAll();
    }


}