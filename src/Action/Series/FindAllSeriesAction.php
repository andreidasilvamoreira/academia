<?php

declare(strict_types=1);

namespace App\Action\Series;

use App\Action\Action;
use App\Services\SerieService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllSeriesAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private SerieService $seriesService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $serie = $this->seriesService->findAll();

        return $this->respondWithData($serie);
    }
}
