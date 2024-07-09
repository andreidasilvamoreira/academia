<?php

declare(strict_types=1);

namespace App\Action\Modalidades;

use App\Action\Action;
use App\Entities\Modalidade;
use App\Services\ModalidadeService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateModalidadeAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private ModalidadeService $modalidadeService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $modalidadeEntity = Modalidade::factory($data);
        $modalidadeCriado = $this->modalidadeService->create($modalidadeEntity);

        return $this->respondWithData($modalidadeCriado);
    }
}