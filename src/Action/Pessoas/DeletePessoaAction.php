<?php

declare(strict_types=1);

namespace App\Action\Pessoas;

use App\Action\Action;
use App\Services\PessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class deletePessoaAction extends action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PessoaService $pessoaService
    ){
        parent::__construct($logger);
    }
    protected function action():Response
    {
        $idPessoa = (int) $this->request->getAttribute('id');
        $this->pessoaService->delete($idPessoa);
        return $this->respondWithData(['message'=>'Pessoa excluida com sucesso']);
    }
}