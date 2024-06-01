<?php

declare(strict_types=1);

namespace App\Action\Pessoas;

use App\Action\Action;
use App\Services\PessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllPessoasAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PessoaService $pessoasService

    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $personagens = $this->pessoasService->findAll();

        return $this->respondWithData($personagens);
    }
}
