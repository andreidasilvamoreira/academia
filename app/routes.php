<?php

declare(strict_types=1);

use App\Action\Academias\CreateAcademiaAction;
use App\Action\Academias\DeleteAcademiaAction;
use App\Action\Academias\FindAcademiaAction;
use App\Action\Academias\FindAllAcademiasAction;
use App\Action\Academias\UpdateAcademiaAction;
use App\Action\Cargas\DeleteCargaAction;
use App\Action\Checkins\CreateCheckinAction;
use App\Action\Checkins\DeleteCheckinAction;
use App\Action\Checkins\FindCheckinAction;
use App\Action\Checkins\FindAllCheckinsAction;
use App\Action\Checkins\UpdateCheckinAction;
use App\Action\Cargas\CreateCargaAction;
use App\Action\Cargas\FindAllCargasAction;
use App\Action\Cargas\FindCargaAction;
use App\Action\Cargas\UpdateCargaAction;
use App\Action\Enderecos\CreateEnderecoAction;
use App\Action\Enderecos\DeleteEnderecoAction;
use App\Action\Enderecos\FindAllEnderecosAction;
use App\Action\Enderecos\FindEnderecoAction;
use App\Action\Enderecos\UpdateEnderecoAction;
use App\Action\Exercicios\CreateExercicioAction;
use App\Action\Exercicios\DeleteExercicioAction;
use App\Action\Exercicios\FindAllExerciciosAction;
use App\Action\Exercicios\FindExercicioAction;
use App\Action\Exercicios\UpdateExercicioAction;
use App\Action\FichasTreinos\CreateFichaTreinoAction;
use App\Action\FichasTreinos\DeleteFichaTreinoAction;
use App\Action\FichasTreinos\FindAllFichasTreinosAction;
use App\Action\FichasTreinos\FindFichaTreinoAction;
use App\Action\FichasTreinos\UpdateFichaTreinoAction;
use App\Action\MateriaisApoioExercicios\CreateMaterialApoioExercicioAction;
use App\Action\MateriaisApoioExercicios\DeleteMaterialApoioExercicioAction;
use App\Action\MateriaisApoioExercicios\FindAllMateriaisApoioExerciciosAction;
use App\Action\MateriaisApoioExercicios\FindMaterialApoioExercicioAction;
use App\Action\MateriaisApoioExercicios\UpdateMaterialApoioExercicioAction;
use App\Action\Modalidades\CreateModalidadeAction;
use App\Action\Modalidades\DeleteModalidadeAction;
use App\Action\Modalidades\FindAllModalidadesAction;
use App\Action\Modalidades\FindModalidadeAction;
use App\Action\Modalidades\UpdateModalidadeAction;
use App\Action\Personagem\CreatePersonagemAction;
use App\Action\Pessoas\deletePessoaAction;
use App\Action\Pessoas\FindAllPessoasAction;
use App\Action\Pessoas\FindPessoaAction;
use App\Action\Pessoas\CreatePessoaAction;
use App\Action\Pessoas\UpdatePessoaAction;
use App\Action\Repeticoes\CreateRepeticaoAction;
use App\Action\Repeticoes\DeleteRepeticaoAction;
use App\Action\Repeticoes\FindAllRepeticoesAction;
use App\Action\Repeticoes\FindRepeticaoAction;
use App\Action\Repeticoes\UpdateRepeticaoAction;
use App\Action\TipoPessoas\CreateTipoPessoaAction;
use App\Action\TipoPessoas\DeleteTipoPessoaAction;
use App\Action\TipoPessoas\FindAllTiposPessoasAction;
use App\Action\TipoPessoas\FindTipoPessoaAction;
use App\Action\TipoPessoas\UpdateTipoPessoaAction;
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
        $group->delete('/{id}', DeletePessoaAction::class);
    });

    $app->group('/enderecos', function (Group $group) {
        $group->get('', FindAllEnderecosAction::class);
        $group->get('/{id}', FindEnderecoAction::class);
        $group->post('', CreateEnderecoAction::class);
        $group->post('/{id}', UpdateEnderecoAction::class);
        $group->delete('/{id}', DeleteEnderecoAction::class);
    });

    $app->group('/academias', function (Group $group) {
        $group->get('', FindAllAcademiasAction::class);
        $group->get('/{id}', FindAcademiaAction::class);
        $group->post('', CreateAcademiaAction::class);
        $group->post('/{id}', UpdateAcademiaAction::class);
        $group->delete('/{id}', DeleteAcademiaAction::class);
    });

    $app->group('/modalidades', function (Group $group) {
        $group->get('', FindAllModalidadesAction::class);
        $group->get('/{id}', FindModalidadeAction::class);
        $group->post('', CreateModalidadeAction::class);
        $group->post('/{id}', UpdateModalidadeAction::class);
        $group->delete('/{id}', DeleteModalidadeAction::class);
    });

    $app->group('/cargas', function (Group $group) {
        $group->get('', FindAllCargasAction::class);
        $group->get('/{id}', FindCargaAction::class);
        $group->post('', CreateCargaAction::class);
        $group->post('/{id}', UpdateCargaAction::class);
        $group->delete('/{id}', DeleteCargaAction::class);
    });

    $app->group('/checkins', function (Group $group) {
        $group->get('', FindAllCheckinsAction::class);
        $group->get('/{id}', FindCheckinAction::class);
        $group->post('', CreateCheckinAction::class);
        $group->post('/{id}', UpdateCheckinAction::class);
        $group->delete('/{id}', DeleteCheckinAction::class);
    });

    $app->group('/tiposPessoas', function (Group $group) {
        $group->get('', FindAllTiposPessoasAction::class);
        $group->get('/{id}', FindTipoPessoaAction::class);
        $group->post('', CreateTipoPessoaAction::class);
        $group->post('/{id}', UpdateTipoPessoaAction::class);
        $group->delete('/{id}', DeleteTipoPessoaAction::class);
    });

    $app->group('/exercicios', function (Group $group) {
        $group->get('', FindAllExerciciosAction::class);
        $group->get('/{id}', FindExercicioAction::class);
        $group->post('', CreateExercicioAction::class);
        $group->post('/{id}', UpdateExercicioAction::class);
        $group->delete('/{id}', DeleteExercicioAction::class);
    });

    $app->group('/fichasTreinos', function (Group $group) {
        $group->get('', FindAllFichasTreinosAction::class);
        $group->get('/{id}', FindFichaTreinoAction::class);
        $group->post('', CreateFichaTreinoAction::class);
        $group->post('/{id}', UpdateFichaTreinoAction::class);
        $group->delete('/{id}', DeleteFichaTreinoAction::class);
    });

    $app->group('/materiaisApoioExercicios', function (Group $group) {
        $group->get('', FindAllMateriaisApoioExerciciosAction::class);
        $group->get('/{id}', FindMaterialApoioExercicioAction::class);
        $group->post('', CreateMaterialApoioExercicioAction::class);
        $group->post('/{id}', UpdateMaterialApoioExercicioAction::class);
        $group->delete('/{id}', DeleteMaterialApoioExercicioAction::class);
    });

    $app->group('/repeticoes', function (Group $group) {
        $group->get('', FindAllRepeticoesAction::class);
        $group->get('/{id}', FindRepeticaoAction::class);
        $group->post('', CreateRepeticaoAction::class);
        $group->post('/{id}', UpdateRepeticaoAction::class);
        $group->delete('/{id}', DeleteRepeticaoAction::class);
    });
//
//    $app->group('/status', function (Group $group) {
//        $group->get('', FindAllStatusAction::class);
//        $group->get('/{id}', FindStatusAction::class);
//        $group->post('', CreateStatusAction::class);
//        $group->post('/{id}', UpdateStatusAction::class);
//        $group->delete('/{id}', DeleteStatusAction::class);
//    });
//
//    $app->group('/tempoFicha', function (Group $group) {
//        $group->get('', FindAllTempoFichasAction::class);
//        $group->get('/{id}', FindTempoFichaAction::class);
//        $group->post('', CreateTempoFichaAction::class);
//        $group->post('/{id}', UpdateTempoFichaAction::class);
//        $group->delete('/{id}', DeleteTempoFichaAction::class);
//    });
//
//    $app->group('/treinosDiarios', function (Group $group) {
//        $group->get('', FindAllTreinosDiariosAction::class);
//        $group->get('/{id}', FindTreinoDiarioAction::class);
//        $group->post('', CreateTreinoDiarioAction::class);
//        $group->post('/{id}', UpdateTreinoDiarioAction::class);
//        $group->delete('/{id}', DeleteTreinoDiarioAction::class);
//    });
};
