<?php

namespace App\Entities;

use App\Utils\Serializable;

class AbstractEntity extends Serializable
{
    const UPDATED_AT = 'updated_at';
    const CREATED_AT = 'created_at';

    private ?int $id;

    /**
     * @var Carbon|null
     * @OA\Property(property="data_alteracao", type="string", format="date-time")
     */
    private  $created_at;

    /**
     * @var Carbon|null
     * @OA\Property(property="data_alteracao", type="string", format="date-time")
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): AbstractEntity
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getCreatedAt(): ?Carbon
    {
        return $this->created_at;
    }

    /**
     * @param Carbon|null $created_at
     * @return AbstractEntity
     */
    public function setCreatedAt(?Carbon $created_at): AbstractEntity
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updated_at;
    }

    /**
     * @param Carbon|null $updated_at
     * @return AbstractEntity
     */
    public function setUpdatedAt(?Carbon $updated_at): AbstractEntity
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    protected function hydrate($data)
    {
        $data = is_array($data) ? (object)$data : $data;
        $this->setId($data->id ?? null);
        $this->setCreatedAt($data->{self::CREATED_AT} ?? null);
        $this->setUpdatedAt($data->{self::UPDATED_AT} ?? null);

        return $this;
    }
}