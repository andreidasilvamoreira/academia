<?php

declare(strict_types=1);

namespace App\Entities;

class Endereco extends AbstractEntity
{
    private ?string $CEP;
    private ?string $rua;
    private ?string $bairro;
    private ?string $cidade;
    private ?string $complemento;

    public function getCEP(): ?string
    {
        return $this->CEP;
    }

    public function setCEP(?string $CEP): Endereco
    {
        $this->CEP = $CEP;
        return $this;
    }

    public function getRua(): ?string
    {
        return $this->rua;
    }

    public function setRua(?string $rua): Endereco
    {
        $this->rua = $rua;
        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): Endereco
    {
        $this->bairro = $bairro;
        return $this;
    }

    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    public function setCidade(?string $cidade): Endereco
    {
        $this->cidade = $cidade;
        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): Endereco
    {
        $this->complemento = $complemento;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setCEP($item->CEP ?? null)
            ->setRua($item->rua ?? null)
            ->setBairro($item->bairro ?? null)
            ->setCidade($item->cidade ?? null)
            ->setComplemento($item->complemento ?? null)
        ;

        return $entity;
    }
}
