<?php

declare(strict_types=1);

namespace App\Action\Exercicios;

use App\Action\Action;
use App\Services\ExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindExercicioDinamicWithsAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private ExercicioService  $exercicioService,

    )
    {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $withs = ['treinoDiario'];
        $idExercicio = $this->request->getAttribute('id');
        $queryParams = $this->request->getQueryParams();
        $withs = !empty($queryParams['withs']) ? $queryParams['withs'] : $withs;
        $exercicio = $this->exercicioService->FindDinamicWith($idExercicio, $withs);

        return $this->respondWithData($exercicio);
    }
}