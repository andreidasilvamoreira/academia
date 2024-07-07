<?php

declare(strict_types=1);

namespace App\Entities;

use Carbon\Carbon;
use function DI\string;


class Pessoa extends AbstractEntity
{
    private ?int $endereco_id;
    private ?string $nome;
    private ?string $cpf;
    private ?float $altura;
    private ?float $peso;
    private  $data_matricula;
    private  $data_nascimento;
    private ?string $senha;
    private ?string $email;

    public function getEnderecoId(): ?int
    {
        return $this->endereco_id;
    }

    public function setEnderecoId(?int $endereco_id): Pessoa
    {
        $this->endereco_id = $endereco_id;
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): Pessoa
    {
        $this->nome = $nome;
        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): Pessoa
    {
        $this->cpf = $cpf;
        return $this;
    }

    public function getAltura(): ?float
    {
        return $this->altura;
    }

    public function setAltura(?float $altura): Pessoa
    {
        $this->altura = $altura;
        return $this;
    }

    public function getPeso(): ?float
    {
        return $this->peso;
    }

    public function setPeso(?float $peso): Pessoa
    {
        $this->peso = $peso;
        return $this;
    }

    public function getDataMatricula(): mixed
    {
        return $this->data_matricula;
    }

    public function setDataMatricula(mixed $data_matricula): Pessoa
    {
        $this->data_matricula = $data_matricula;
        return $this;
    }

    public function getDataNascimento(): mixed
    {
        return $this->data_nascimento;
    }

    public function setDataNascimento(mixed $data_nascimento): Pessoa
    {
        $this->data_nascimento = $data_nascimento;
        return $this;
    }

    public function getSenha(): ?string
    {
        return $this->senha;
    }

    public function setSenha(?string $senha): Pessoa
    {
        $this->senha = $senha;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): Pessoa
    {
        $this->email = $email;
        return $this;
    }
    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;
        $entity = (new self())
            ->hydrate($item)
            ->setEnderecoId($item->endereco_id ? (int)$item->endereco_id : null)
            ->setNome($item->nome ? (string)$item->nome : null)
            ->setCpf($item->cpf ? (string)$item->cpf : null)
            ->setAltura($item->altura ? (float)$item->altura : null)
            ->setPeso($item->peso ? (float)$item->peso : null)
            ->setDataMatricula($item->data_matricula ?? null)
            ->setDataNascimento($item->data_nascimento  ?? null)
            ->setSenha($item->senha ? (string)$item->senha : null)
            ->setEmail($item->email ? (string)$item->email : null)
        ;

        return $entity;
    }
}
