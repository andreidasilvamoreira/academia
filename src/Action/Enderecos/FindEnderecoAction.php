<?php

declare(strict_types=1);

namespace App\Action\Enderecos;

use App\Action\Action;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindEnderecoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private EnderecoService $enderecoService

    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idEndereco = $this->request->getAttribute('id');
        $endereco = $this->enderecoService->find($idEndereco);

        return $this->respondWithData($endereco);
    }
}
