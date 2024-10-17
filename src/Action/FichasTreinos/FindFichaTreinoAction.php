<?php

declare(strict_types=1);

namespace App\Action\FichasTreinos;

use App\Action\Action;
use App\Services\FichaTreinoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
class FindFichaTreinoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private FichaTreinoService $fichaTreinoService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $idFichaTreino = $this->request->getAttribute('id');
        $idFichaTreino = $this->fichaTreinoService->find($idFichaTreino);
        return $this->respondWithData($idFichaTreino);
    }
}