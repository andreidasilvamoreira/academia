<?php


namespace App\Action\TreinosDiarios;

use App\Action\Action;
use App\Entities\TreinoDiario;
use App\Services\TreinoDiarioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateTreinoDiarioAction extends Action
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
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $treinoDiarioEntity = TreinoDiario::factory($data)->setId($idTreinoDiario);
        $TreinoDiario = $this->treinoDiarioService->update($treinoDiarioEntity);

        return $this->respondWithData($TreinoDiario);
    }
}