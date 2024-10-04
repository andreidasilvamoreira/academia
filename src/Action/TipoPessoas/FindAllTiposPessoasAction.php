<?php

declare(strict_types=1);

namespace App\Action\TipoPessoas;

use App\Action\Action;
use App\Entities\TipoPessoa;
use App\Services\TipoPessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllTiposPessoasAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TipoPessoaService $tipoPessoaService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $tipoPessoa = $this->tipoPessoaService->findAll();

        return $this->respondWithData($tipoPessoa);
    }
}
