<?php

declare(strict_types=1);

use App\Action\Academias\CreateAcademiaAction;
use App\Action\Academias\FindAcademiaAction;
use App\Action\Academias\FindAllAcademiasAction;
use App\Action\Academias\UpdateAcademiaAction;
use App\Action\Checkins\CreateCheckinAction;
use App\Action\Checkins\FindCheckinAction;
use App\Action\Checkins\FindAllCheckinsAction;
use App\Action\Checkins\UpdateCheckinAction;
use App\Action\Cargas\CreateCargaAction;
use App\Action\Cargas\FindAllCargasAction;
use App\Action\Cargas\FindCargaAction;
use App\Action\Cargas\UpdateCargaAction;
use App\Action\Enderecos\CreateEnderecoAction;
use App\Action\Enderecos\FindAllEnderecosAction;
use App\Action\Enderecos\FindEnderecoAction;
use App\Action\Enderecos\UpdateEnderecoAction;
use App\Action\Modalidades\CreateModalidadeAction;
use App\Action\Modalidades\FindAllModalidadesAction;
use App\Action\Modalidades\FindModalidadeAction;
use App\Action\Modalidades\UpdateModalidadeAction;
use App\Action\Personagem\CreatePersonagemAction;
use App\Action\Pessoas\FindAllPessoasAction;
use App\Action\Pessoas\FindPessoaAction;
use App\Action\Pessoas\CreatePessoaAction;
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
        $response->getBody()->write('Server on!');
        return $response;
    });

    $app->group('/personagens', function (Group $group) {
        $group->get('', FindAllPersonagemAction::class);
        $group->get('/{id}', FindPersonagemAction::class);
        $group->post('', CreatePersonagemAction::class);
    });

    $app->group('/pessoas', function (Group $group) {
        $group->get('', FindAllPessoasAction::class);
        $group->get('/{id}', FindPessoaAction::class);
        $group->post('', CreatePessoaAction::class);
        $group->post('/{id}', UpdatePessoaAction::class);
    });

    $app->group('/enderecos', function (Group $group) {
        $group->get('', FindAllEnderecosAction::class);
        $group->get('/{id}', FindEnderecoAction::class);
        $group->post('', CreateEnderecoAction::class);
        $group->post('/{id}', UpdateEnderecoAction::class);
    });

    $app->group('/academias', function (Group $group) {
        $group->get('', FindAllAcademiasAction::class);
        $group->get('/{id}', FindAcademiaAction::class);
        $group->post('', CreateAcademiaAction::class);
        $group->post('/{id}', UpdateAcademiaAction::class);
    });

    $app->group('/modalidades', function (Group $group) {
        $group->get('', FindAllModalidadesAction::class);
        $group->get('/{id}', FindModalidadeAction::class);
        $group->post('', CreateModalidadeAction::class);
        $group->post('/{id}', UpdateModalidadeAction::class);
    });

    $app->group('/cargas', function (Group $group) {
        $group->get('', FindAllCargasAction::class);
        $group->get('/{id}', FindCargaAction::class);
        $group->post('', CreateCargaAction::class);
        $group->post('/{id}', UpdateCargaAction::class);
    });

    $app->group('/checkins', function (Group $group) {
        $group->get('', FindAllCheckinsAction::class);
        $group->get('/{id}', FindCheckinAction::class);
        $group->post('', CreateCheckinAction::class);
        $group->post('/{id}', UpdateCheckinAction::class);
    });
};
