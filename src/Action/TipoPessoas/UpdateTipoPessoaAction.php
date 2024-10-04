<?php

declare(strict_types=1);

namespace App\Action\TipoPessoas;

use App\Action\Action;
use App\Entities\TipoPessoa;
use App\Services\TipoPessoaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateTipoPessoaAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private TipoPessoaService $tipoPessoaService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idTipoPessoa = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $tipoPessoaEntity = TipoPessoa::factory($data)->setId($idTipoPessoa);
        $tipoPessoa = $this->tipoPessoaService->update($tipoPessoaEntity);

        return $this->respondWithData($tipoPessoa);
    }
}
