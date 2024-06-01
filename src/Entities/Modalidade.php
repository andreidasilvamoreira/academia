<?php

declare(strict_types=1);

namespace App\Entities;

class Modalidade extends AbstractEntity
{
    private ?string $nome;
    private ?string $slug   ;
    private ?string $descricao;
    private ?string $objetivo;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Modalidade
    {
        $this->nome = $nome;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): Modalidade
    {
        $this->slug = $slug;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): Modalidade
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(?string $objetivo): Modalidade
    {
        $this->objetivo = $objetivo;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setSlug($item->slug ?? null)
            ->setDescricao($item->descricao ?? null)
            ->setObjetivo($item->objetivo ?? null)
        ;

        return $entity;
    }
}
