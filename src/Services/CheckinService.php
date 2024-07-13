<?php

namespace App\Services;

use App\Entities\Carga;
use App\Entities\Checkin;
use App\Repositories\CargaRepository;
use App\Repositories\CheckinRepository;

class CheckinService
{

    public function __construct(private CheckinRepository $checkinRepository)
    {
    }
    public function findAll()
    {
        return $this->checkinRepository->findAll();
    }
    public function find($id)
    {
        return $this->checkinRepository->find($id);
    }

    public function create(Checkin $checkin)
    {
        return $this->checkinRepository->create($checkin);
    }

    public function update(Checkin $checkin)
    {
         $this->checkinRepository->update($checkin);
    }
}