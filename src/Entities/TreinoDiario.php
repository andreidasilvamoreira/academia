<?php

declare(strict_types=1);

namespace App\Entities;

class TreinoDiario extends AbstractEntity
{
    private ?string $nome;
    private ?string $slug;
    private ?int $ficha_treino_id;
    private ?int $checkin_id;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): TreinoDiario
    {
        $this->nome = $nome;
        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): TreinoDiario
    {
        $this->slug = $slug;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getFichaTreinoId(): ?int
    {
        return $this->ficha_treino_id;
    }

    /**
     * @param int|null $ficha_treino_id
     * @return TreinoDiario
     */
    public function setFichaTreinoId(?int $ficha_treino_id): TreinoDiario
    {
        $this->ficha_treino_id = $ficha_treino_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCheckinId(): ?int
    {
        return $this->checkin_id;
    }

    /**
     * @param int|null $checkin_id
     * @return TreinoDiario
     */
    public function setCheckinId(?int $checkin_id): TreinoDiario
    {
        $this->checkin_id = $checkin_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setSlug($item->slug ?? null)
            ->setFichaTreinoId($item->ficha_treino_id ?? null)
            ->setCheckinId($item->checkin_id ?? null)
        ;

        return $entity;
    }
}
