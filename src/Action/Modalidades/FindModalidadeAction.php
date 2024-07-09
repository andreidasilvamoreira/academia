<?php

declare(strict_types=1);

namespace App\Action\Modalidades;

use App\Action\Action;
use App\Services\EnderecoService;
use App\Services\ModalidadeService;
use PhpParser\Node\Expr\AssignOp\Mod;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindModalidadeAction extends Action
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
        $modalidade = $this->modalidadeService->find($idModalidade);

        return $this->respondWithData($modalidade);
    }
}
