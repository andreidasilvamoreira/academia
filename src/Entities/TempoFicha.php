<?php

declare(strict_types=1);

namespace App\Entities;

class TempoFicha extends AbstractEntity
{
    private ?string $data_inicio;
    private ?string $data_fim;
    private ?string $quantidade_dias;
    private ?string $pessoa_id;

    public function getDataInicio(): ?string
    {
        return $this->data_inicio;
    }

    public function setDataInicio(?string $data_inicio): TempoFicha
    {
        $this->data_inicio = $data_inicio;
        return $this;
    }

    public function getDataFim(): ?string
    {
        return $this->data_fim;
    }

    public function setDataFim(?string $data_fim): TempoFicha
    {
        $this->data_fim = $data_fim;
        return $this;
    }

    public function getQuantidadeDias(): ?string
    {
        return $this->quantidade_dias;
    }

    public function setQuantidadeDias(?string $quantidade_dias): TempoFicha
    {
        $this->quantidade_dias = $quantidade_dias;
        return $this;
    }

    public function getPessoaId(): ?string
    {
        return $this->pessoa_id;
    }

    public function setPessoaId(?string $pessoa_id): TempoFicha
    {
        $this->pessoa_id = $pessoa_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setDataInicio($item->data_inicio ?? null)
            ->setDataFim($item->data_fim ?? null)
            ->setQuantidadeDias($item->quantidade_dias ?? null)
            ->setPessoaId($item->pessoa_id ?? null)
        ;

        return $entity;
    }
}
