<?php

declare(strict_types=1);

namespace App\Action\Repeticoes;

use App\Action\Action;
use App\Entities\Repeticao;
use App\Services\RepeticaoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class CreateRepeticaoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private RepeticaoService $repeticaoService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $repeticaoEntity = Repeticao::factory($data);
        $repeticaoCriada = $this->repeticaoService->create($repeticaoEntity);

        return $this->respondWithData($repeticaoCriada);
    }
}