<?php

declare(strict_types=1);

namespace App\Action\Academias;

use App\Action\Action;
use App\Entities\Academia;
use App\Services\AcademiaService;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAcademiaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private AcademiaService $academiaService

    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idAcademia = $this->request->getAttribute('id');
        $academia = $this->academiaService->find($idAcademia);

        return $this->respondWithData($academia);
    }
}
