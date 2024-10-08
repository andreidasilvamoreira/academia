<?php


declare(strict_types=1);

namespace App\Action\Modalidades;

use App\Action\Action;
use App\Services\ModalidadeService;
use Illuminate\Support\Facades\Log;
use PhpParser\Node\Expr\AssignOp\Mod;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteModalidadeAction extends Action
{

    public function __construct(
      protected LoggerInterface $logger,
      private ModalidadeService $modalidadeService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idModalidade = $this->request->getAttribute('id');
        $this->modalidadeService->delete($idModalidade);

        return $this->respondWithData(['message'=> 'Modalidade excluida com sucesso']);
    }
}