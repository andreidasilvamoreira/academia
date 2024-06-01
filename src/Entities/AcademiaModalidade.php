<?php

declare(strict_types=1);

namespace App\Entities;

class AcademiaModalidade extends AbstractEntity
{
    private ?string $academia_id;
    private ?string $modalidade_id;

    public function getAcademiaId(): ?string
    {
        return $this->academia_id;
    }

    public function setAcademiaId(?string $academia_id): AcademiaModalidade
    {
        $this->academia_id = $academia_id;
        return $this;
    }

    public function getModalidadeId(): ?string
    {
        return $this->modalidade_id;
    }

    public function setModalidadeId(?string $modalidade_id): AcademiaModalidade
    {
        $this->modalidade_id = $modalidade_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setAcademiaId($item->academia_id ?? null)
            ->setModalidadeId($item->modalidade_id ?? null)
        ;

        return $entity;
    }
}
