<?php

namespace App\Action\TempoFichas;

use App\Action\Action;
use App\Entities\TempoFicha;
use App\Services\TempoFichaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateTempoFichaAction extends Action
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
        $idTempoFicha = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $tempoFichaEntity = TempoFicha::factory($data)->setId($idTempoFicha);
        $tempoFicha = $this->tempoFichaService->update($tempoFichaEntity);

        return $this->respondWithData($tempoFicha);
    }
}