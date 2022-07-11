<?php

namespace App\Repositories;

use App\DTO\RetornoLoginDTO;
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

    public function getUserByPassword(string $username, string $password) : ? Users
    {
        // TODO: Implement getUserByPassword() method.
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('username', $username)
            ->where('password', $password)
            ->first();

    }
}
