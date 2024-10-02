<?php

declare(strict_types=1);

namespace App\Action\Series;

use App\Action\Action;
use App\Services\SerieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindSerieAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private SerieService $seriesService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idSerie = $this->request->getAttribute('id');
        $serie = $this->seriesService->find($idSerie);

        return $this->respondWithData($serie);
    }
}
