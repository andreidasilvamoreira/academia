<?php

namespace App\Action\Status;

use App\Action\Action;
use App\Entities\Status;
use App\Services\StatusService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateStatusAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private StatusService $statusService,
    ) {
        parent::__construct($logger);
    }
    protected function action():Response
    {
        $idStatus = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $statusEntity = Status::factory($data)->setId($idStatus);
        $this->statusService->update($statusEntity);

        return $this->respondWithData(['message' => 'Status atualizada com sucesso']);    }
}