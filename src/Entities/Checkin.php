<?php

declare(strict_types=1);

namespace App\Entities;

class Checkin extends AbstractEntity
{
    private ?string $data_check_in;
    private ?string $duracao_treino;
    private ?string $motivo_status;
    private ?string $pessoa_id;
    private ?string $status_id;

    public function getDataCheckIn(): ?string
    {
        return $this->data_check_in;
    }

    public function setDataCheckIn(?string $data_check_in): Checkin
    {
        $this->data_check_in = $data_check_in;
        return $this;
    }

    public function getDuracaoTreino(): ?string
    {
        return $this->duracao_treino;
    }

    public function setDuracaoTreino(?string $duracao_treino): Checkin
    {
        $this->duracao_treino = $duracao_treino;
        return $this;
    }

    public function getMotivoStatus(): ?string
    {
        return $this->motivo_status;
    }

    public function setMotivoStatus(?string $motivo_status): Checkin
    {
        $this->motivo_status = $motivo_status;
        return $this;
    }

    public function getPessoaId(): ?string
    {
        return $this->pessoa_id;
    }

    public function setPessoaId(?string $pessoa_id): Checkin
    {
        $this->pessoa_id = $pessoa_id;
        return $this;
    }

    public function getStatusId(): ?string
    {
        return $this->status_id;
    }

    public function setStatusId(?string $status_id): Checkin
    {
        $this->status_id = $status_id;
        return $this;
    }


    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setDataCheckIn($item->data_check_in ?? null)
            ->setDuracaoTreino($item->duracao_treino ?? null)
            ->setMotivoStatus($item->motivo_status ?? null)
            ->setPessoaId($item->pessoa_id ?? null)
            ->setStatusId($item->status_id ?? null)
        ;

        return $entity;
    }
}
