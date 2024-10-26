<?php

declare(strict_types=1);

namespace App\Action\Repeticoes;

use App\Services\RepeticaoService;
use Psr\Log\LoggerInterface;
use App\Action\Action;
use Psr\Http\Message\ResponseInterface as Response;

class FindAllRepeticoesAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private RepeticaoService $repeticaoService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $repeticao = $this->repeticaoService->findAll();

        return $this->respondWithData($repeticao);
    }
}