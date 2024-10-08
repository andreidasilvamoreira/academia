<?php

declare(strict_types=1);

namespace App\Action\Cargas;

use App\Action\Action;
use App\Services\CargaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteCargaAction extends Action
{
    public function __construct(

        protected LoggerInterface $logger,
        private CargaService $cargaService,

    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $cargaModel = $this->request->getAttribute('id');
        $this->cargaService->delete($cargaModel);

        return $this->respondWithData(['message' => 'Carga excluida com sucesso']);
    }
}