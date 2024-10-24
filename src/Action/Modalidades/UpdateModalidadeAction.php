<?php

declare(strict_types=1);

namespace App\Action\Modalidades;

use App\Action\Action;
use App\Entities\Endereco;
use App\Entities\Modalidade;
use App\Services\EnderecoService;
use App\Services\ModalidadeService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateModalidadeAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private ModalidadeService $modalidadeService
    ) {
      parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idModalidade = $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $modalidadeEntity = Modalidade::factory($data)->setId($idModalidade);
        $this->modalidadeService->update($modalidadeEntity);
        return $this->respondWithData(['message' => 'Modalidade atualizada com sucesso']);
    }
}
