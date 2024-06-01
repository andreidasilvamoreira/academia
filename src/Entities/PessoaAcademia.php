<?php

declare(strict_types=1);

namespace App\Entities;

class PessoaAcademia extends AbstractEntity
{
    private ?string $academia_id;
    private ?string $pessoa_id;

    public function getAcademiaId(): ?string
    {
        return $this->academia_id;
    }

    public function setAcademiaId(?string $academia_id): PessoaAcademia
    {
        $this->academia_id = $academia_id;
        return $this;
    }

    public function getPessoaId(): ?string
    {
        return $this->pessoa_id;
    }

    public function setPessoaId(?string $pessoa_id): PessoaAcademia
    {
        $this->pessoa_id = $pessoa_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setAcademiaId($item->academia ?? null)
            ->setPessoaId($item->pessoa ?? null)
        ;

        return $entity;
    }
}
