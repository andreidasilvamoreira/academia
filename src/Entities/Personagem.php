<?php

declare(strict_types=1);

namespace App\Entities;

class Personagem extends AbstractEntity
{
    private ?string $nome;
    private ?int $nivel;
    private ?int $total_vida;
    private ?int $total_vida_bonus;
    private ?int $vida_atual;
    private ?int $experiencia;
    private ?int $raca_id ;
    private ?int $classe_id;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Personagem
    {
        $this->nome = $nome;
        return $this;
    }

    public function getNivel(): ?int
    {
        return $this->nivel;
    }

    public function setNivel(?int $nivel): Personagem
    {
        $this->nivel = $nivel;
        return $this;
    }

    public function getTotalVida(): ?int
    {
        return $this->total_vida;
    }

    public function setTotalVida(?int $total_vida): Personagem
    {
        $this->total_vida = $total_vida;
        return $this;
    }

    public function getTotalVidaBonus(): ?int
    {
        return $this->total_vida_bonus;
    }

    public function setTotalVidaBonus(?int $total_vida_bonus): Personagem
    {
        $this->total_vida_bonus = $total_vida_bonus;
        return $this;
    }

    public function getVidaAtual(): ?int
    {
        return $this->vida_atual;
    }

    public function setVidaAtual(?int $vida_atual): Personagem
    {
        $this->vida_atual = $vida_atual;
        return $this;
    }

    public function getExperiencia(): ?int
    {
        return $this->experiencia;
    }

    public function setExperiencia(?int $experiencia): Personagem
    {
        $this->experiencia = $experiencia;
        return $this;
    }

    public function getRacaId(): ?int
    {
        return $this->raca_id;
    }

    public function setRacaId(?int $raca_id): Personagem
    {
        $this->raca_id = $raca_id;
        return $this;
    }

    public function getClasseId(): ?int
    {
        return $this->classe_id;
    }

    public function setClasseId(?int $classe_id): Personagem
    {
        $this->classe_id = $classe_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setNivel($item->nivel ?? null)
            ->setTotalVida($item->total_vida ?? null)
            ->setTotalVidaBonus($item->total_vida_bonus ?? null)
            ->setVidaAtual($item->vida_atual ?? null)
            ->setExperiencia($item->experiencia ?? null)
            ->setRacaId($item->raca_id ?? null)
            ->setClasseId($item->classe_id ?? null)
        ;

        return $entity;
    }
}
