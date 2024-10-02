<?php

declare(strict_types=1);

namespace App\Action\Series;

use App\Action\Action;
use App\Entities\Serie;
use App\Services\SerieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateSerieAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private SerieService $serieService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $serieEntity = Serie::factory($data);
        $serieCriado = $this->serieService->create($serieEntity);

        return $this->respondWithData($serieCriado);
    }
}
