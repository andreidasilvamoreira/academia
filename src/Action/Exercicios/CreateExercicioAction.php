<?php

declare(strict_types=1);

namespace App\Action\Exercicios;

use App\Action\Action;
use App\Entities\Exercicio;
use App\Services\ExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateExercicioAction extends Action
{
    public function __construct(
      protected LoggerInterface $logger,
      private ExercicioService $exercicioService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $exercicioEntity = Exercicio::factory($data);
        $exercicioCriado = $this->exercicioService->create($exercicioEntity);

        return $this->respondWithData($exercicioCriado);    }
}