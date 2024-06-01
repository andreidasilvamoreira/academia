<?php

declare(strict_types=1);

namespace App\Entities;

class Carga extends AbstractEntity
{
    private ?string $numero_cargas;

    public function getNumeroCargas(): ?string
    {
        return $this->numero_cargas;
    }

    public function setNumeroCargas(?string $numero_cargas): Carga
    {
        $this->numero_cargas = $numero_cargas;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNumeroCargas($item->numero_cargas ?? null)
        ;

        return $entity;
    }
}
