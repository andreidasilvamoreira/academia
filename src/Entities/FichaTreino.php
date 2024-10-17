<?php

declare(strict_types=1);

namespace App\Entities;

class FichaTreino extends AbstractEntity
{
    private ?string $objetivos;
    private ?string $experiencia;
    private ?string $recomendacoes_medicas;
    private ?string $condicoes_medicas;
    private ?int $treinador_responsavel_id;
    private ?string $objetivo;
    private ?int $academia_id;
    private ?int $tempo_ficha_id;

    /**
     * @return int|null
     */
    public function getAcademiaId(): ?int
    {
        return $this->academia_id;
    }

    /**
     * @param int|null $academia_id
     * @return FichaTreino
     */
    public function setAcademiaId(?int $academia_id): FichaTreino
    {
        $this->academia_id = $academia_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTempoFichaId(): ?int
    {
        return $this->tempo_ficha_id;
    }

    /**
     * @param int|null $tempo_ficha_id
     * @return FichaTreino
     */
    public function setTempoFichaId(?int $tempo_ficha_id): FichaTreino
    {
        $this->tempo_ficha_id = $tempo_ficha_id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTreinadorResponsavelId(): ?int
    {
        return $this->treinador_responsavel_id;
    }

    /**
     * @param int|null $treinador_responsavel_id
     * @return FichaTreino
     */
    public function setTreinadorResponsavelId(?int $treinador_responsavel_id): FichaTreino
    {
        $this->treinador_responsavel_id = $treinador_responsavel_id;
        return $this;
    }

    public function getObjetivos(): ?string
    {
        return $this->objetivos;
    }

    public function setObjetivos(?string $objetivos): FichaTreino
    {
        $this->objetivos = $objetivos;
        return $this;
    }

    public function getExperiencia(): ?string
    {
        return $this->experiencia;
    }

    public function setExperiencia(?string $experiencia): FichaTreino
    {
        $this->experiencia = $experiencia;
        return $this;
    }

    public function getRecomendacoesMedicas(): ?string
    {
        return $this->recomendacoes_medicas;
    }

    public function setRecomendacoesMedicas(?string $recomendacoes_medicas): FichaTreino
    {
        $this->recomendacoes_medicas = $recomendacoes_medicas;
        return $this;
    }

    public function getCondicoesMedicas(): ?string
    {
        return $this->condicoes_medicas;
    }

    public function setCondicoesMedicas(?string $condicoes_medicas): FichaTreino
    {
        $this->condicoes_medicas = $condicoes_medicas;
        return $this;
    }

    public function getObjetivo(): ?string
    {
        return $this->objetivo;
    }

    public function setObjetivo(?string $objetivo): FichaTreino
    {
        $this->objetivo = $objetivo;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setObjetivos($item->objetivos ?? null)
            ->setExperiencia($item->experiencia ?? null)
            ->setRecomendacoesMedicas($item->recomendacoes_medicas ?? null)
            ->setCondicoesMedicas($item->condicoes_medicas ?? null)
            ->setTreinadorResponsavelId($item->treinador_responsavel_id ?? null)
            ->setObjetivo($item->objetivo ?? null)
            ->setAcademiaId($item->academia_id ?? null)
            ->setTempoFichaId($item->tempo_ficha_id ?? null)
        ;

        return $entity;
    }
}
