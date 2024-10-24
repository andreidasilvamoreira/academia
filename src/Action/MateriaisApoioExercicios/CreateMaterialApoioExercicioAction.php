<?php

declare(strict_types=1);

namespace App\Action\MateriaisApoioExercicios;

use App\Action\Action;
use App\Entities\MaterialApoioExercicio;
use App\Services\MaterialApoioExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;
class CreateMaterialApoioExercicioAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private MaterialApoioExercicioService $materialApoioExercicioSerivce,
    ){
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $materialApoioExercicioEntity = MaterialApoioExercicio::factory($data);
        $materialApoioExercicioCriado = $this->materialApoioExercicioSerivce->create($materialApoioExercicioEntity);

        return $this->respondWithData($materialApoioExercicioCriado);
    }
}