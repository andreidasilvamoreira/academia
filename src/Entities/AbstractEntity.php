<?php

namespace App\Entities;

use App\Utils\Serializable;

class AbstractEntity extends Serializable
{
    private ?int $id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }

    public function __construct()
    {
    }

    protected function hydrate($data)
    {
        $data = is_array($data) ? (object)$data : $data;
        $this->setId($data->id ?? null);

        return $this;
    }
}