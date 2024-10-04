<?php

declare(strict_types=1);

namespace App\Action\TipoPessoas;

use App\Action\Action;
use Psr\Log\LoggerInterface;
use App\Entities\TipoPessoa;
use App\Services\TipoPessoaService;
use Psr\Http\Message\ResponseInterface as Response;

class CreateTipoPessoaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TipoPessoaService $tipoPessoaService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $tipoPessoaEntity = TipoPessoa::factory($data);
        $tipoPessoaCriada = $this->tipoPessoaService->create($tipoPessoaEntity);

        return $this->respondWithData($tipoPessoaCriada);
    }
}