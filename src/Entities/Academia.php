<?php

declare(strict_types=1);

namespace App\Entities;

use App\Traits\Attr\Id;

class Academia extends AbstractEntity
{


    private ?string $nome;
    private ?int $telefone;
    private ?string $horario_funcionamento_abertura;
    private ?string $horario_funcionamento_fechamento;
    private ?int $endereco_id;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Academia
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTelefone(): ?int
    {
        return $this->telefone;
    }

    /**
     * @param int|null $telefone
     * @return Academia
     */
    public function setTelefone(?int $telefone): Academia
    {
        $this->telefone = $telefone;
        return $this;
    }

    public function getHorarioFuncionamentoAbertura(): ?string
    {
        return $this->horario_funcionamento_abertura;
    }

    public function setHorarioFuncionamentoAbertura(?string $horario_funcionamento_abertura): Academia
    {
        $this->horario_funcionamento_abertura = $horario_funcionamento_abertura;
        return $this;
    }

    public function getHorarioFuncionamentoFechamento(): ?string
    {
        return $this->horario_funcionamento_fechamento;
    }

    public function setHorarioFuncionamentoFechamento(?string $horario_funcionamento_fechamento): Academia
    {
        $this->horario_funcionamento_fechamento = $horario_funcionamento_fechamento;
        return $this;
    }

    public function getEnderecoId(): ?int
    {
        return $this->endereco_id;
    }

    public function setEnderecoId(?int $endereco_id): Academia
    {
        $this->endereco_id = $endereco_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setNome($item->nome ?? null)
            ->setTelefone($item->telefone ?? null)
            ->setHorarioFuncionamentoAbertura($item->horario_funcionamento_abertura ?? null)
            ->setHorarioFuncionamentoFechamento($item->horario_funcionamento_fechamento ?? null)
            ->setEnderecoId($item->endereco_id ?? null)
        ;

        return $entity;
    }
}
