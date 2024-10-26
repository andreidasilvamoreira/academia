<?php

namespace App\Action\Status;

use App\Action\Action;
use App\Entities\Status;
use App\Services\StatusService;
use Psr\Log\LoggerInterface;
use Psr\Http\Message\ResponseInterface as Response;

class CreateStatusAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private StatusService $statusService,
    ) {
        parent::__construct($logger);
    }
    protected function action():Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $statusEntity = Status::factory($data);
        $statusCriada = $this->statusService->create($statusEntity);

        return $this->respondWithData($statusCriada);    }
}