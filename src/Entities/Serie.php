<?php

declare(strict_types=1);

namespace App\Entities;

class Serie extends AbstractEntity
{
    private ?int $repeticoes_id;
    private ?int $exercicio_id;
    private ?int $carga_id;


    public function getRepeticoesId(): ?int
    {
        return $this->repeticoes_id;
    }


    public function setRepeticoesId(?int $repeticoes_id): Serie
    {
        $this->repeticoes_id = $repeticoes_id;
        return $this;
    }


    public function getExercicioId(): ?int
    {
        return $this->exercicio_id;
    }


    public function setExercicioId(?int $exercicio_id): Serie
    {
        $this->exercicio_id = $exercicio_id;
        return $this;
    }


    public function getCargaId(): ?int
    {
        return $this->carga_id;
    }


    public function setCargaId(?int $carga_id): Serie
    {
        $this->carga_id = $carga_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setRepeticoesId($item->repeticoes_id ? (int)$item->repeticoes_id : null)
            ->setExercicioId($item->exercicio_id ? (int)$item->exercicio_id : null)
            ->setCargaId($item->carga_id ? (int)$item->carga_id : null)
        ;

        return $entity;
    }
}
