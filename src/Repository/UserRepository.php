<?php
namespace Homework\Firstapi\Repository;
use Homework\Firstapi\Model\User;

class UserRepository
{
    private $users = [];

    public function __construct()
    {
        $this->users = [
            1 => new User(1, 'Gabriel', 20),
            2 => new User(2, 'Faustino', 32),
        ];
    }

    public function getAllUsers()
    {
        return $this->users;
    }

    public function getById($id)
    {
        return $this->users[$id] ?? null;
    }

    public function createUser(User $user)
    {
        // conta elementos em um array
        $id = count($this->users) + 1;
        $user->setId($id);
        $this->users[$id] = $user;
        return $user;
    }   

    public function updateUser($id, User $user)
    {
        if (isset($this->$user[$id])) {
            $this->users[$id] = $user;
            return $this->$user[$id];
        }

        return null;
    }

    public function deleteUser($id)
    {
        if (isset($this->users[$id])) {
            unset($this->users[$id]);
            return true;
        }
        return false;
    }
}
