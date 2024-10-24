<?php

declare(strict_types=1);

namespace App\Action\Pessoas;

use App\Action\Action;
use App\Entities\Pessoa;
use App\Services\PessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdatePessoaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PessoaService $pessoaService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idPessoa = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $pessoaEntity = Pessoa::factory($data)->setId($idPessoa);
        $this->pessoaService->update($pessoaEntity);

        return $this->respondWithData(['message' => 'Pessoa atualizada com sucesso']);
    }
}
