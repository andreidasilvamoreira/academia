<?php

declare(strict_types=1);

namespace App\Entities;

class MaterialApoioExercicio extends AbstractEntity
{
    private ?string $titulo;
    private ?string $tipo;
    private ?string $url;

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(?string $titulo): MaterialApoioExercicio
    {
        $this->titulo = $titulo;
        return $this;
    }

    public function getTipo(): ?string
    {
        return $this->tipo;
    }

    public function setTipo(?string $tipo): MaterialApoioExercicio
    {
        $this->tipo = $tipo;
        return $this;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): MaterialApoioExercicio
    {
        $this->url = $url;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setTitulo($item->titulo ?? null)
            ->setTipo($item->tipo ?? null)
            ->setUrl($item->url ?? null)
        ;

        return $entity;
    }
}
