<?php


namespace App\Action\TreinosDiarios;

use App\Action\Action;
use App\Services\TreinoDiarioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindTreinoDiarioAction extends Action
{
    public function __construct(
        protected LoggerInterface   $logger,
        private TreinoDiarioService $treinoDiarioService,
    )
    {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idTreinoDiario = $this->request->getAttribute('id');
        $treinoDiario = $this->treinoDiarioService->find($idTreinoDiario);

        return $this->respondWithData($treinoDiario);
    }
}