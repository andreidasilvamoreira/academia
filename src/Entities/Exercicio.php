<?php

declare(strict_types=1);

namespace App\Entities;

class Exercicio extends AbstractEntity
{
    private ?string $nome;
    private ?string $musculatura_alvo;
    private ?string $dificuldade;
    private ?int $quantidade_series;
    private ?string $descricao;
    private ?string $concluido;
    private ?string $equipamentos_necessarios;
    private ?int $material_apoio_id;

    /**
     * @return int|null
     */
    public function getMaterialApoioId(): ?int
    {
        return $this->material_apoio_id;
    }

    /**
     * @param int|null $material_apoio_id
     * @return Exercicio
     */
    public function setMaterialApoioId(?int $material_apoio_id): Exercicio
    {
        $this->material_apoio_id = $material_apoio_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQuantidadeSeries(): ?int
    {
        return $this->quantidade_series;
    }

    /**
     * @param int|null $quantidade_series
     * @return Exercicio
     */
    public function setQuantidadeSeries(?int $quantidade_series): Exercicio
    {
        $this->quantidade_series = $quantidade_series;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Exercicio
    {
        $this->nome = $nome;
        return $this;
    }

    public function getMusculaturaAlvo(): ?string
    {
        return $this->musculatura_alvo;
    }

    public function setMusculaturaAlvo(?string $musculatura_alvo): Exercicio
    {
        $this->musculatura_alvo = $musculatura_alvo;
        return $this;
    }

    public function getDificuldade(): ?string
    {
        return $this->dificuldade;
    }

    public function setDificuldade(?string $dificuldade): Exercicio
    {
        $this->dificuldade = $dificuldade;
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): Exercicio
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getConcluido(): ?string
    {
        return $this->concluido;
    }

    public function setConcluido(?string $concluido): Exercicio
    {
        $this->concluido = $concluido;
        return $this;
    }

    public function getEquipamentosNecessarios(): ?string
    {
        return $this->equipamentos_necessarios;
    }

    public function setEquipamentosNecessarios(?string $equipamentos_necessarios): Exercicio
    {
        $this->equipamentos_necessarios = $equipamentos_necessarios;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setMusculaturaAlvo($item->musculatura_alvo ?? null)
            ->setDificuldade($item->dificuldade ?? null)
            ->setQuantidadeSeries($item->quantidade_series ?? null)
            ->setDescricao($item->descricao ?? null)
            ->setConcluido($item->concluido ?? null)
            ->setEquipamentosNecessarios($item->equipamentos_necessarios ?? null)
            ->setMaterialApoioId($item->material_apoio_id ?? null)
        ;

        return $entity;
    }
}
