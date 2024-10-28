<?php

declare(strict_types=1);

namespace App\Entities;

class TempoFicha extends AbstractEntity
{
    private ?string $data_inicio;
    private ?string $data_fim;
    private ?int $quantidade_dias;
    private ?int $pessoa_id;

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

    /**
     * @return int|null
     */
    public function getQuantidadeDias(): ?int
    {
        return $this->quantidade_dias;
    }

    /**
     * @param int|null $quantidade_dias
     * @return TempoFicha
     */
    public function setQuantidadeDias(?int $quantidade_dias): TempoFicha
    {
        $this->quantidade_dias = $quantidade_dias;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPessoaId(): ?int
    {
        return $this->pessoa_id;
    }

    /**
     * @param int|null $pessoa_id
     * @return TempoFicha
     */
    public function setPessoaId(?int $pessoa_id): TempoFicha
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
