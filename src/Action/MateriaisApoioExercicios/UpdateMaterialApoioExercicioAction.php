<?php

declare(strict_types=1);

namespace App\Action\MateriaisApoioExercicios;

use App\Action\Action;
use App\Entities\MaterialApoioExercicio;
use App\Services\MaterialApoioExercicioService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateMaterialApoioExercicioAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private MaterialApoioExercicioService $materialApoioExercicioService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $idMaterialApoioExercicio = $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $materialApoioExercicioEntity = MaterialApoioExercicio::factory($data)->setId($idMaterialApoioExercicio);
        $this->materialApoioExercicioService->update($materialApoioExercicioEntity);


        return $this->respondWithData(['message' => 'Material de Apoio atualizda com sucesso']);
    }
}