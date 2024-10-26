<?php

namespace App\Services;

use App\Entities\Status;
use App\Repositories\Statusrepository;

class StatusService
{
    public function __construct(private StatusRepository $statusRepository)
    {
    }

    public function findAll()
    {
        return $this->statusRepository->findAll();
    }

    public function find($id)
    {
        return $this->statusRepository->find($id);
    }

    public function create(Status $status)
    {
        return $this->statusRepository->create($status);
    }

    public function update(Status $status)
    {
        return $this->statusRepository->update($status);
    }

    public function delete($id)
    {
        return $this->statusRepository->delete($id);
    }
}