<?php

namespace App\Entities;

use App\Utils\Serializable;

class AbstractEntity extends Serializable
{
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    private mixed $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(mixed $id): self
    {
        $this->id = $id ? (int)$id : null;
        return $this;
    }

    protected function hydrate($data)
    {
        $data = is_array($data) ? (object)$data : $data;

        $this->setId($data->id ?? null);

        return $this;
    }
}