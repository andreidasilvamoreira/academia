<?php

declare(strict_types=1);

namespace App\Entities;

class Academia extends AbstractEntity
{
    private ?string $nome;
    private ?string $telefone;
    private ?string $horario_funcionamento_abertura;
    private ?string $horario_funcionamento_fechamento;
    private ?string $endereco_id;

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Academia
    {
        $this->nome = $nome;
        return $this;
    }

    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    public function setTelefone(?string $telefone): Academia
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

    public function getEnderecoId(): ?string
    {
        return $this->endereco_id;
    }

    public function setEnderecoId(?string $endereco_id): Academia
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
