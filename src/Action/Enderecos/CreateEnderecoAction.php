<?php

declare(strict_types=1);

namespace App\Action\Enderecos;

use App\Action\Action;
use App\Entities\Endereco;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateEnderecoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private EnderecoService $enderecoService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $enderecoEntity = Endereco::factory($data);
        $enderecoCriado = $this->enderecoService->create($enderecoEntity);

        return $this->respondWithData($enderecoCriado);
    }
}