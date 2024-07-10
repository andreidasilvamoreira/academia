<?php

namespace App\Entities;

use App\Utils\Serializable;

class AbstractEntity extends Serializable
{
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    private ?int $id;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return AbstractEntity
     */
    public function setId(?int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }

    protected function hydrate($data)
    {
        $data = is_array($data) ? (object)$data : $data;

        $this->setId($data->id ?? null);

        return $this;
    }
}