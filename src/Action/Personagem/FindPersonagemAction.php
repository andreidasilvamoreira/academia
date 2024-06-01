<?php

declare(strict_types=1);

namespace App\Action\Personagem;

use App\Action\Action;
use App\Services\PersonagemService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindPersonagemAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PersonagemService $personagemService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $idPersonagem = $this->request->getAttribute('id');
        $personagem = $this->personagemService->find($idPersonagem);

        return $this->respondWithData($personagem);
    }
}
