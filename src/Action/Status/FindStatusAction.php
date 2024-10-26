<?php

namespace App\Action\Status;

use App\Action\Action;
use App\Services\StatusService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindStatusAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private StatusService $statusService,
    ) {
        parent::__construct($logger);
    }
    protected function action():Response
    {
        $idStatus = $this->request->getAttribute('id');
        $status = $this->statusService->find($idStatus);

        return $this->respondWithData($status);    }
}