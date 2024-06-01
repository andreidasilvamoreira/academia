<?php

namespace App\Services;

use App\Entities\Personagem;
use App\Repositories\PersonagemRepository;

class PersonagemService
{

    public function __construct(private PersonagemRepository $personagemRepository)
    {
    }

    public function findAll()
    {
        return $this->personagemRepository->findAll();
    }

    public function find($id)
    {
        return $this->personagemRepository->find($id);
    }

    public function create(Personagem $personagem)
    {
        return $this->personagemRepository->create($personagem);
    }

}