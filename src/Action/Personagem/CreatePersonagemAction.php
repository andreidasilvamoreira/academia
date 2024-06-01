<?php

declare(strict_types=1);

namespace App\Action\Personagem;

use App\Action\Action;
use App\Entities\Personagem;
use App\Services\PersonagemService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreatePersonagemAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PersonagemService $personagemService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $personagemEntity = Personagem::factory($data);
        $personagemCriado = $this->personagemService->create($personagemEntity);

        return $this->respondWithData($personagemCriado);
    }
}
