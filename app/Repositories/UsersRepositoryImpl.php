<?php

namespace App\Repositories;

use App\DTO\ReturnLoginDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Models\User;
use App\Models\Users;
use Illuminate\Support\Facades\DB;

class UsersRepositoryImpl implements UsersRepository
{
    private $usersModel;
    private $dateTime;

    public function __construct(Users $users)
    {
        $this->usersModel = $users;
        $this->dateTime = new \DateTime();
    }

    public function getUserById(int $id) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('id_users', $id)
            ->where('deleted_at', null)
            ->first();
    }

    public function getUserByUsername(string $username) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('username', $username)
            ->where('deleted_at', null)
            ->first();
    }

    public function getUserByPassword(string $username, string $password) : ? Users
    {
        return $this->usersModel
            ->setConnection('brewery')
            ->select('*')
            ->where('username', $username)
            ->where('password', $password)
            ->where('deleted_at', null)
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

    public function updateUser(\stdClass $data): bool
    {
        $resultUser = $this->usersModel->setConnection('brewery')
            ->find($data->idUsers);

        unset($data->idUsers);
        foreach ($data as $key => $value)
            $resultUser->$key = $value;

        return $resultUser->save();
    }

    public function deleteUser(\stdClass $data): bool
    {
        $resultUser = $this->usersModel->setConnection('brewery')
            ->find($data->idUsers);

        $resultUser->deleted_at = $this->dateTime;

        return $resultUser->save();
    }
}
