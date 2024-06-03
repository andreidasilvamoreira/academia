<?php

declare(strict_types=1);

namespace App\Action\Pessoas;

use App\Action\Action;
use App\Entities\Pessoa;
use App\Services\PessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreatePessoasAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PessoaService $pessoaService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $pessoaEntity = Pessoa::factory($data);
        $pessoaCriado = $this->pessoaService->create($pessoaEntity);

        return $this->respondWithData($pessoaCriado);
    }
}