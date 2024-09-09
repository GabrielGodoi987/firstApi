<?php

namespace Homework\Firstapi\Controller;

class UserController
{
    private $users = [
        [
            "id" => 1,
            "name" => "Gabriel Godoi",
            "age" => 20,
            "currentJob" => "Full-stack developer"
        ]
    ];
    public function getUsers()
    {
        return $this->users;
    }

    public function insertUser($data)
    {
        array_push($this->users, $data);
        return $data;
    }

    public function updateUser($id, $newData)
    {
        $index = array_search($id, array_column($this->users, 'id'));
        if ($index)
            $this->users[$index] = $newData;

        return $newData;
    }

    public function deleteUser($id)
    {
        $findElement = array_search($id, array_column($this->users, 'id'));
        if ($findElement)
            array_splice($this->users, $findElement, 1);

        return $findElement;
    }
}
