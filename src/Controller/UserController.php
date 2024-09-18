<?php

namespace Homework\Firstapi\Controller;

use Homework\Firstapi\Repository\UserRepository;
use Homework\Firstapi\Model\User;

class UserController
{
    private $userRepository;

    public function __construct()
    {
        $this->userRepository = new UserRepository();
    }
    public function getAllUsers()
    {
        $users = $this->userRepository->getAllUsers();
        $result = [];

        foreach ($users as $user) {
            $result[] = [
                "id" => $user->getId(),
                "nome" => $user->getNome(),
                "idade" => $user->getIdade(),
            ];
        }

        return $result;
    }

    public function getUserById($id)
    {
        $user = $this->userRepository->getById($id);
        if ($user) {
            return [
                'id' => $user->getId(),
                'nome' => $user->getNome(),
                'idade' => $user->getIdade()
            ];
        }
        return null;
    }

    public function createUser($userData)
    {
        $user = new User();
        $user->setNome($userData['nome']);
        $user->setIdade($userData['idade']);

        $createdUser = $this->userRepository->createUser($user);

        return [
            'id' => $createdUser->getId(),
            'nome' => $createdUser->getNome(),
            'idade' => $createdUser->getIdade()
        ];
    }

    public function updateUser($id, $userData)
    {
        $user = $this->userRepository->getById($id);

        if ($user) {
            if (isset($userData['nome'])) {
                $user->setNome($userData['nome']);
            }
            if (isset($userData['idade'])) {
                $user->setIdade($userData['idade']);
            }

            $updateUser = $this->userRepository->updateUser($user, $user);

            return [
                'id' => $updateUser->getId(),
                'nome' => $updateUser->getNome(),
                'idade' => $updateUser->getIdade()
            ];
        }

        return null;
    }

    public function deleteUser($id)
    {
        return $this->userRepository->deleteUser($id);
    }
}
