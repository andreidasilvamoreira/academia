<?php

declare(strict_types=1);

namespace App\Action\Exercicios;

use App\Action\Action;
use App\Entities\Exercicio;
use App\Services\ExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateExercicioAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private ExercicioService $exercicioService,

    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $idExercicio = $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $exercicioEntity = Exercicio::factory($data)->setId($idExercicio);
        $exercicio = $this->exercicioService->update($exercicioEntity);

        return $this->respondWithData($exercicio);    }
}