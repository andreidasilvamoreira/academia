<?php

namespace App\Repositories;

use App\Domain\User\UserNotFoundException;
use App\Entities\Personagem;
use App\Models\PersonagemModel;
use Illuminate\Database\Eloquent\Collection;

class PersonagemRepository extends AbstractRepository
{

    public function __construct(private PersonagemModel $personagem)
    {
    }

    protected function getTableName(): string
    {
        return $this->personagem->getTable();
    }

    public function findAll(): array
    {
        return $this->personagem->all()->map(
            fn(PersonagemModel $personagem) => Personagem::factory($personagem->toArray())
        )->toArray();
    }

    public function find($id): ?Personagem
    {
        $personagem = $this->personagem->find($id);

        return $personagem ? Personagem::factory($personagem->toArray()) : null;
    }

    public function create(Personagem $personagem): Personagem
    {
        $personagemModel = $this->personagem->query()->create($personagem->toArray());

        return Personagem::factory([
            'id' => $personagemModel->id,
        ]);
    }

}
