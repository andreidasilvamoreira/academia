<?php

declare(strict_types=1);

namespace App\Entities;

class Serie extends AbstractEntity
{
    private ?string $endereco_id;

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setEnderecoid($item->endereco_id ?? null)
        ;

        return $entity;
    }
}
