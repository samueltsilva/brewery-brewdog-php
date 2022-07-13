<?php

namespace App\Repositories;

use App\DTO\ReturnLoginDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Models\User;
use App\Models\Users;

class UsersRepositoryImpl implements UsersRepository
{
    private $usersModel;

    public function __construct(Users $users)
    {
        $this->usersModel = $users;
    }

    public function getUserById(int $id) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('id_users', $id)
            ->first();
    }

    public function getUserByUsername(string $username) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('username', $username)
            ->first();
    }

    public function getUserByPassword(string $username, string $password) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('username', $username)
            ->where('password', $password)
            ->first();
    }

    public function createUser(\stdClass $data) : int
    {
        $this->usersModel->setAttribute('username', $data->username);
        $this->usersModel->setAttribute('password', $data->password);
        $this->usersModel->setAttribute('first_name', $data->firstName);
        $this->usersModel->setAttribute('address', $data->address);
        $this->usersModel->setAttribute('number', $data->number);
        $this->usersModel->setAttribute('status', $data->status);
        $this->usersModel->setAttribute('last_name', $data->lastName);

        $this->usersModel->setConnection('brewery')->save();

        return $this->usersModel->getAttribute('id_users');
    }
}
