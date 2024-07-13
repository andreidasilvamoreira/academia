<?php

declare(strict_types=1);

namespace App\Action\Checkins;

use App\Action\Action;
use App\Entities\Checkin;
use App\Services\CheckinService;
use phpDocumentor\Reflection\Types\Integer;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateCheckinAction extends Action
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
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $checkinEntity = Checkin::factory($data)->setId($idCheckin);
        $checkinCriado = $this->checkinService->update($checkinEntity);

        return $this->respondWithData($checkinCriado);
    }
}
