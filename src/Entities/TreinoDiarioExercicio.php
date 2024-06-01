<?php

declare(strict_types=1);

namespace App\Entities;

class TreinoDiarioExercicio extends AbstractEntity
{
    private ?string $treino_diario_id;
    private ?string $exercicio_id;

    public function getTreinoDiarioId(): ?string
    {
        return $this->treino_diario_id;
    }

    public function setTreinoDiarioId(?string $treino_diario_id): TreinoDiarioExercicio
    {
        $this->treino_diario_id = $treino_diario_id;
        return $this;
    }

    public function getExercicioId(): ?string
    {
        return $this->exercicio_id;
    }

    public function setExercicioId(?string $exercicio_id): TreinoDiarioExercicio
    {
        $this->exercicio_id = $exercicio_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setTreinoDiarioId($item->treino_diario_id ?? null)
            ->setExercicioId($item->exercicio_id ?? null)
        ;

        return $entity;
    }
}
