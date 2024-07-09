<?php

declare(strict_types=1);

namespace App\Action\Academias;

use App\Action\Action;
use App\Entities\Academia;
use App\Services\AcademiaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateAcademiaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private AcademiaService $academiaService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $academiaEntity = Academia::factory($data);
        $academiaCriado = $this->academiaService->create($academiaEntity);

        return $this->respondWithData($academiaCriado);
    }
}