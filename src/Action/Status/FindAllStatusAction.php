<?php

namespace App\Action\Status;

use App\Action\Action;
use App\Services\StatusService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllStatusAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private StatusService $statusService,
    ) {
        parent::__construct($logger);
    }
    protected function action():Response
    {
        $status = $this->statusService->findAll();

        return $this->respondWithData($status);    }
}