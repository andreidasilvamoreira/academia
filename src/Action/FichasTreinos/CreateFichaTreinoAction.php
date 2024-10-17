<?php

declare(strict_types=1);

namespace App\Action\FichasTreinos;

use App\Action\Action;
use App\Entities\FichaTreino;
use App\Services\FichaTreinoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateFichaTreinoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private FichaTreinoService $fichaTreinoService,
    ) {
      parent::__construct($logger);
    }
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $fichaTreinoEntity = FichaTreino::factory($data);
        $fichaTreinoCriado = $this->fichaTreinoService->create($fichaTreinoEntity);

        return $this->respondWithData($fichaTreinoCriado);
    }
}