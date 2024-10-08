<?php

declare(strict_types=1);

namespace App\Action\TipoPessoas;

use App\Action\Action;
use App\Services\TipoPessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteTipoPessoaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TipoPessoaService $tipoPessoaService
    )
    {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $tipoPessoaModel = $this->request->getAttribute('id');
        $this->tipoPessoaService->delete($tipoPessoaModel);

        return $this->respondWithData(['message' => 'TipoPessoa foi excluida com sucesso']);
    }
}