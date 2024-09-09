<?php

namespace Homework\Firstapi;

require_once '../vendor/autoload.php';

use Homework\Firstapi\Controller\UserController;
use Homework\Firstapi\Utils\JsonResponse;
use Homework\Firstapi\enums\HttpCode;
use Homework\Firstapi\enums\Routes;

$method = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];
$usersController = new UserController();
$responseJson = new JsonResponse();

switch ($method) {
    case 'GET':
        switch ($uri) {
            case Routes::HOME:
                $response = $usersController->getUsers();
                if ($response)
                    $responseJson->responseWithData(HttpCode::created, true, 'Chegou com sucesso', $response);
                break;
            default:
                $responseJson->responseNoData(HttpCode::userError, true, 'Essa rota não exites');
                break;
        }
        break;
    case 'POST':
        switch ($uri) {
            case Routes::USERS:
                $input = json_decode(file_get_contents('php://input'), true);
                $response = $usersController->insertUser($input);
                $data = $usersController->getUsers();
                if ($response)
                    $responseJson->responseWithData(HttpCode::ok, true, "Usuário criado com sucesso", $data);
                break;
            default:
                $responseJson->responseNoData(HttpCode::userError, true, "Erro ao cadastrar novo usuáriou");
                break;
        }
        break;
    case 'PUT':
        if (preg_match('/\/users\/(\d+)/', $uri, $matches)) {
            $id = $matches[1];
            $input = json_decode(file_get_contents('php://input'), true);
            $response = $usersController->updateUser($id, $input);
            if ($response) {
                $responseJson->responseWithData(HttpCode::ok, true, 'usuário atualizado com sucesso', $input);
            } else {
                $responseJson->responseNoData(HttpCode::userError, true, 'Erro ao cadastrar novo usuário');
            }
        }
        break;

    case "DELETE":
        if (preg_match('/\/users\/(\d+)/', $uri, $matches)) {

            $id = $matches[1];
            unset($users[$id]);
            $response = $usersController->deleteUser($id);
            if ($response) {
                $responseJson->responseWithData(HttpCode::ok, true, "Usuário deletado com sucesso", $response);
            } else {
                $responseJson->responseNoData(HttpCode::userError, true, "Erro ao deletar usuário");
            }
        }

    default:
        $responseJson->responseNoData(HttpCode::ok, true, 'Sucesso');
        break;
}
