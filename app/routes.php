<?php

declare(strict_types=1);

use App\Action\Personagem\CreatePersonagemAction;
use App\Action\Pessoas\FindAllPessoasAction;
use App\Action\Pessoas\FindPessoasAction;
use App\Action\Pessoas\CreatePessoasAction;
use App\Action\Pessoas\UpdatePessoaAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;
use App\Action\Personagem\FindAllPersonagemAction;
use App\Action\Personagem\FindPersonagemAction;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/personagens', function (Group $group) {
        $group->get('', FindAllPersonagemAction::class);
        $group->get('/{id}', FindPersonagemAction::class);
        $group->post('', CreatePersonagemAction::class);
    });

    $app->group('/pessoas', function (Group $group) {
        $group->get('', FindAllPessoasAction::class);
        $group->get('/{id}', FindPessoasAction::class);
        $group->post('', CreatePessoasAction::class);
        $group->post('/{id}', UpdatePessoaAction::class);
    });
};
