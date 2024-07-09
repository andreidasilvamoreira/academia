<?php

declare(strict_types=1);

namespace App\Action\Academias;

use App\Action\Action;
use App\Entities\Academia;
use App\Services\AcademiaService;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllAcademiasAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private AcademiaService $academiaService

    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $academia = $this->academiaService->findAll();

        return $this->respondWithData($academia);
    }
}
