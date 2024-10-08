<?php

declare(strict_types=1);

namespace App\Action\Enderecos;

use App\Action\Action;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteEnderecoAction extends Action
{
    public function __construct(
      protected LoggerInterface $logger,
      private EnderecoService $enderecoService,
    ) {

    }
    protected function action(): Response
    {
        $enderecoModel = $this->request->getAttribute('id');
        $this->enderecoService->delete($enderecoModel);

        return $this->respondWithData(['message'=> 'Endereco excluido com sucesso']);
    }
}