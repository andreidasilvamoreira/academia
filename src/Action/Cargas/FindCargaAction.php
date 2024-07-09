<?php

declare(strict_types=1);

namespace App\Action\Cargas;

use App\Action\Action;
use App\Services\CargaService;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindCargaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private CargaService $cargaService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idCarga = $this->request->getAttribute('id');
        $carga = $this->cargaService->find($idCarga);

        return $this->respondWithData($carga);
    }
}
