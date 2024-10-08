<?php

declare(strict_types=1);

namespace App\Action\Checkins;

use App\Action\Action;
use App\Services\CheckinService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class DeleteCheckinAction extends Action
{
    public function __construct(
      protected LoggerInterface $logger,
      private CheckinService $checkinService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $checkinModel = $this->request->getAttribute('id');
        $this->checkinService->delete($checkinModel);

        return $this->respondWithData(['message' => 'Checkin excluido com suceso']);
    }
}