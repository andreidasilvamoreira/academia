<?php

declare(strict_types=1);

namespace App\Entities;

class ExercicioModalidade extends AbstractEntity
{
    private ?string $exercicio_id;
    private ?string $modalidade_id;

    public function getExercicioId(): ?string
    {
        return $this->exercicio_id;
    }

    public function setExercicioId(?string $exercicio_id): ExercicioModalidade
    {
        $this->exercicio_id = $exercicio_id;
        return $this;
    }

    public function getModalidadeId(): ?string
    {
        return $this->modalidade_id;
    }

    public function setModalidadeId(?string $modalidade_id): ExercicioModalidade
    {
        $this->modalidade_id = $modalidade_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setExercicioId($item->exercicio_id ?? null)
            ->setModalidadeId($item->modalidade_id ?? null)
        ;

        return $entity;
    }
}
