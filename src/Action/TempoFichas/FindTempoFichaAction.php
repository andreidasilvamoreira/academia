<?php

namespace App\Action\TempoFichas;

use App\Action\Action;
use App\Services\TempoFichaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindTempoFichaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TempoFichaService $tempoFichaService,
    )
    {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idTempoFicha = $this->request->getAttribute('id');
        $tempoFicha = $this->tempoFichaService->find($idTempoFicha);

        return $this->respondWithData($tempoFicha);
    }
}