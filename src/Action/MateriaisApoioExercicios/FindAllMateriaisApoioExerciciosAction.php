<?php

declare(strict_types=1);

namespace App\Action\MateriaisApoioExercicios;

use App\Action\Action;
use App\Services\MaterialApoioExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
class FindAllMateriaisApoioExerciciosAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private MaterialApoioExercicioService $materialApoioExercicioService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $materialApoioExercicio = $this->materialApoioExercicioService->findAll();

        return $this->respondWithData($materialApoioExercicio);
    }
}