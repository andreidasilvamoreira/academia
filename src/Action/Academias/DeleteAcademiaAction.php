<?php


declare(strict_types=1);

namespace App\Action\Academias;

use App\Action\Action;
use App\Entities\Academia;
use App\Models\AcademiaModel;
use App\Services\AcademiaService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteAcademiaAction extends action
{
    public function __construct(
        protected LoggerInterface $logger,
        private AcademiaService $academiaService,
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idAcademia = (int) $this->request->getAttribute('id');
        $this->academiaService->delete($idAcademia);

        return $this->respondWithData(['message' => 'Academia excluida com sucesso']);
    }
}