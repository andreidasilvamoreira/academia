<?php

declare(strict_types=1);

namespace App\Entities;

class Checkin extends AbstractEntity
{
    private ?string $data_check_in;
    private ?int $duracao_treino;
    private ?string $motivos_status;
    private ?int $pessoa_id;
    private ?int $status_id;


    public function getMotivosStatus(): ?string
    {
        return $this->motivos_status;
    }
    public function setMotivosStatus(?string $motivos_status): Checkin
    {
        $this->motivos_status = $motivos_status;
        return $this;
    }

    public function getDataCheckIn(): ?string
    {
        return $this->data_check_in;
    }

    public function setDataCheckIn(?string $data_check_in): Checkin
    {
        $this->data_check_in = $data_check_in;
        return $this;
    }

    public function getDuracaoTreino(): ?int
    {
        return $this->duracao_treino;
    }

    public function setDuracaoTreino(?int $duracao_treino): Checkin
    {
        $this->duracao_treino = $duracao_treino;
        return $this;
    }

    public function getPessoaId(): ?int
    {
        return $this->pessoa_id;
    }

    public function setPessoaId(?int $pessoa_id): Checkin
    {
        $this->pessoa_id = $pessoa_id;
        return $this;
    }

    public function getStatusId(): ?int
    {
        return $this->status_id;
    }

    public function setStatusId(?int $status_id): Checkin
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
            ->setMotivosStatus($item->motivos_status ?? null)
            ->setPessoaId($item->pessoa_id ?? null)
            ->setStatusId($item->status_id ?? null)
        ;

        return $entity;
    }
}
