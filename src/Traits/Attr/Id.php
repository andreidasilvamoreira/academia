<?php

namespace App\Traits\Attr;

trait Id
{
    /**
     * @var ?mixed
     */
    protected mixed $id;

    /**
     * @return mixed|null
     */
    public function getId(): mixed
    {
        return $this->id;
    }

    /**
     * @param mixed|null $id
     * @return self
     */
    public function setId(mixed $id): self
    {
        $this->id = $id;
        return $this;
    }
}