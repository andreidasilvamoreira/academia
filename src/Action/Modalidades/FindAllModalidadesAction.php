<?php

declare(strict_types=1);

namespace App\Action\Modalidades;

use App\Action\Action;
use App\Services\ModalidadeService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllModalidadesAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private ModalidadeService $modalidadeService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $modalidades = $this->modalidadeService->findAll();

        return $this->respondWithData($modalidades);
    }
}
