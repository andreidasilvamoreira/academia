<?php

declare(strict_types=1);

namespace App\Action\Exercicios;

use App\Action\Action;
use App\Services\ExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllExerciciosWithTreinoDiarioAction extends Action
{
    public function __construct(
      protected LoggerInterface $logger,
      private ExercicioService $exercicioService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $exercicios = $this->exercicioService->findAllWithTreinoDiario();

        return $this->respondWithData($exercicios);
    }
}