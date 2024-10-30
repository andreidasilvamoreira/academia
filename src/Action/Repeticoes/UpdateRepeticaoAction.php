<?php

declare(strict_types=1);

namespace App\Action\Repeticoes;

use App\Action\Action;
use App\Entities\Repeticao;
use App\Services\RepeticaoService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Log\LoggerInterface;

class UpdateRepeticaoAction extends Action
{
    public function __construct(
        protected LoggerInterface $logger,
        private RepeticaoService $repeticaoService,
    ) {
        parent::__construct($logger);
    }
    protected function action(): Response
    {
        $idRepeticao = (int) $this->request->getAttribute('id');
        $data = $this->request->getParsedBody();
        $data = $this->inferDataTypes($data);
        $repeticaoEntity = Repeticao::factory($data)->setId($idRepeticao);
        $repeticao = $this->repeticaoService->update($repeticaoEntity);

        return $this->respondWithData($repeticao);
    }
}