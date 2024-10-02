<?php

namespace App\Services;

use App\Entities\Serie;
use App\Repositories\SerieRepository;
use phpDocumentor\Reflection\DocBlock\Serializer;

class SerieService
{
    public function __construct(private SerieRepository $serieRepository)
    {
    }
    public function findAll()
    {
        return $this->serieRepository->findAll();
    }

    public function find($id)
    {
        return $this->serieRepository->find($id);
    }

    public function create(Serie $serie)
    {
        return $this->serieRepository->create($serie);
    }

    public function update(Serie $serie)
    {
        $this->serieRepository->update($serie);
    }
}