<?php

declare(strict_types=1);

namespace App\Action\Enderecos;

use App\Action\Action;
use App\Entities\Endereco;
use App\Services\EnderecoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateEnderecoAction extends Action
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
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $enderecoEntity = Endereco::factory($data)->setId($idEndereco);
        $this->enderecoService->update($enderecoEntity);

        return $this->respondWithData(['message' => 'Endereço atualizado com sucesso']);
    }
}
