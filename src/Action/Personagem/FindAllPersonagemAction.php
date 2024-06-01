<?php

declare(strict_types=1);

namespace App\Action\Personagem;

use App\Action\Action;
use App\Services\PersonagemService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindAllPersonagemAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private PersonagemService $personagemService
    ) {
        parent::__construct($logger);
    }

    protected function action(): Response
    {
        $personagens = $this->personagemService->findAll();

        return $this->respondWithData($personagens);
    }
}
