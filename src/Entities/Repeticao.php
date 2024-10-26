<?php

declare(strict_types=1);

namespace App\Entities;

class Repeticao extends AbstractEntity
{
    private ?int $quantidade_repeticoes;
    private ?string $tempo_descanso;

    /**
     * @return int|null
     */
    public function getQuantidadeRepeticoes(): ?int
    {
        return $this->quantidade_repeticoes;
    }

    /**
     * @param int|null $quantidade_repeticoes
     * @return Repeticao
     */
    public function setQuantidadeRepeticoes(?int $quantidade_repeticoes): Repeticao
    {
        $this->quantidade_repeticoes = $quantidade_repeticoes;
        return $this;
    }

    public function getTempoDescanso(): ?string
    {
        return $this->tempo_descanso;
    }

    public function setTempoDescanso(?string $tempo_descanso): Repeticao
    {
        $this->tempo_descanso = $tempo_descanso;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setQuantidadeRepeticoes($item->quantidade_repeticoes ?? null)
            ->setTempoDescanso($item->tempo_descanso ?? null)
        ;

        return $entity;
    }
}
