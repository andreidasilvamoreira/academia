<?php

declare(strict_types=1);

namespace App\Action\TipoPessoas;

use App\Action\Action;
use App\Services\TipoPessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindTipoPessoaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TipoPessoaService $tipoPessoaService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idTipoPessoa = $this->request->getAttribute('id');
        $tipoPessoa = $this->tipoPessoaService->find($idTipoPessoa);

        return $this->respondWithData($tipoPessoa);
    }
}
