<?php

declare(strict_types=1);

namespace App\Entities;

class Status extends AbstractEntity
{
    private ?string $nome;
    private ?string $slug;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Status
    {
        $this->nome = $nome;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): Status
    {
        $this->slug = $slug;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setSlug($item->slug ?? null)
        ;

        return $entity;
    }
}
