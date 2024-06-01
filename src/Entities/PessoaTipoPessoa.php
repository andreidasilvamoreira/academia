<?php

declare(strict_types=1);

namespace App\Entities;

class PessoaTipoPessoa extends AbstractEntity
{
    private ?string $pessoa_id;
    private ?string $tipo_pessoa_id;

    public function getPessoaId(): ?string
    {
        return $this->pessoa_id;
    }

    public function setPessoaId(?string $pessoa_id): PessoaTipoPessoa
    {
        $this->pessoa_id = $pessoa_id;
        return $this;
    }

    public function getTipoPessoaId(): ?string
    {
        return $this->tipo_pessoa_id;
    }

    public function setTipoPessoaId(?string $tipo_pessoa_id): PessoaTipoPessoa
    {
        $this->tipo_pessoa_id = $tipo_pessoa_id;
        return $this;
    }

    public static function factory($item): self
    {
        $item = is_array($item) ? (object)$item : $item;

        $entity = (new self())
            ->hydrate($item)
            ->setPessoaId($item->pessoa ?? null)
            ->setTipoPessoaId($item->tipo_pessoa ?? null)
        ;

        return $entity;
    }
}
