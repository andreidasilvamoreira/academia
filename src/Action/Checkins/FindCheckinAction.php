<?php

declare(strict_types=1);

namespace App\Action\Checkins;

use App\Action\Action;
use App\Entities\Checkin;
use App\Services\CheckinService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindCheckinAction extends Action
{
    public function __construct(
      protected LoggerInterface $logger,
      private CheckinService $checkinService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idCheckin = $this->request->getAttribute('id');
        $checkin = $this->checkinService->find($idCheckin);

        return $this->respondWithData($checkin);
    }
}
