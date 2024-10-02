<?php

declare(strict_types=1);

namespace App\Action\Series;

use App\Action\Action;
use App\Entities\Serie;
use App\Services\SerieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateSerieAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private SerieService $seriesService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idSerie = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $serieEntity = Serie::factory($data)->setId($idSerie);
        $serie = $this->seriesService->update($serieEntity);

        return $this->respondWithData($serie);
    }
}
