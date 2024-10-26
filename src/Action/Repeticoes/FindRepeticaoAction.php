<?php

declare(strict_types=1);

namespace App\Action\Repeticoes;

use App\Action\Action;
use App\Services\RepeticaoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class FindRepeticaoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private RepeticaoService $repeticaoService
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $idRepeticao = $this->request->getAttribute('id');
        $repeticao = $this->repeticaoService->find($idRepeticao);

        return $this->respondWithData($repeticao);
    }
}