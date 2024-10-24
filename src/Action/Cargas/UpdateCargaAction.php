<?php

declare(strict_types=1);

namespace App\Action\Cargas;

use App\Action\Action;
use App\Entities\Carga;
use App\Services\CargaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateCargaAction extends Action
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
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $cargaEntity = Carga::factory($data)->setId($idCarga);
        $this->cargaService->update($cargaEntity);

        return $this->respondWithData(['message' => 'Carga atualizada com sucesso']);
    }
}
