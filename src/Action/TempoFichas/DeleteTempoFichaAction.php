<?php

namespace App\Action\TempoFichas;

use App\Action\Action;
use App\Services\TempoFichaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteTempoFichaAction extends Action
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
        $this->tempoFichaService->delete($idTempoFicha);

        return $this->respondWithData(['message' => 'Tempo Ficha excluido com sucesso']);
    }
}