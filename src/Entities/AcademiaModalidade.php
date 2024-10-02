<?php

declare(strict_types=1);

namespace App\Entities;

class AcademiaModalidade extends AbstractEntity
{
    private ?int $academia_id;
    private ?int $modalidade_id;

    /**
     * @return int|null
     */
    public function getAcademiaId(): ?int
    {
        return $this->academia_id;
    }

    /**
     * @param int|null $academia_id
     * @return AcademiaModalidade
     */
    public function setAcademiaId(?int $academia_id): AcademiaModalidade
    {
        $this->academia_id = $academia_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getModalidadeId(): ?int
    {
        return $this->modalidade_id;
    }

    /**
     * @param int|null $modalidade_id
     * @return AcademiaModalidade
     */
    public function setModalidadeId(?int $modalidade_id): AcademiaModalidade
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
