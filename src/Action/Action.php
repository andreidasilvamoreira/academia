<?php

declare(strict_types=1);

namespace App\Action;

use App\DomainException\DomainRecordNotFoundException;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Log\LoggerInterface;
use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

abstract class Action
{
    protected LoggerInterface $logger;

    protected Request $request;

    protected Response $response;

    protected array $args;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    /**
     * @throws HttpNotFoundException
     * @throws HttpBadRequestException
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $this->request = $request;
        $this->response = $response;
        $this->args = $args;

        try {
            return $this->action();
        } catch (DomainRecordNotFoundException $e) {
            throw new HttpNotFoundException($this->request, $e->getMessage());
        }
    }

    /**
     * @throws DomainRecordNotFoundException
     * @throws HttpBadRequestException
     */
    abstract protected function action(): Response;

    /**
     * @return array|object
     */
    protected function getFormData()
    {
        return $this->request->getParsedBody();
    }

    /**
     * @return mixed
     * @throws HttpBadRequestException
     */
    protected function resolveArg(string $name)
    {
        if (!isset($this->args[$name])) {
            throw new HttpBadRequestException($this->request, "Could not resolve argument `{$name}`.");
        }

        return $this->args[$name];
    }

    /**
     * @param array|object|null|bool $data
     */
    protected function respondWithData($data = null, int $statusCode = 200): Response
    {

        if($data === null) {

            $data = ['message' => 'id não encontrado'];
            $statusCode = 404;
        }
        $payload = new ActionPayload($statusCode, $data);

        return $this->respond($payload);
    }

    protected function respond(ActionPayload $payload): Response
    {
        $json = json_encode($payload, JSON_PRETTY_PRINT);
        $this->response->getBody()->write($json);

        return $this->response
                    ->withHeader('Content-Type', 'application/json')
                    ->withStatus($payload->getStatusCode());
    }

    /**
     * @description Metodo serve para inferir os tipos de dados
     * Analisar os valores dos dados e determinar seus tipos de dados
     * @param array $data
     * @return array
     */
    protected function inferDataTypes(array $data): array
    {
        foreach ($data as $key => $value) {
            if (is_string($value) && is_numeric($value)) {
                if (strpos($value, '.') !== false) {
                    $data[$key] = (float) $value;
                } else {
                    $data[$key] = (int) $value;
                }
            } elseif (is_string($value) && strtolower($value) === 'true') {
                $data[$key] = true;
            } elseif (is_string($value) && strtolower($value) === 'false') {
                $data[$key] = false;
            }
        }
        return $data;
    }
}
