<?php

namespace App\Interfaces\Repository;

use App\Models\Users;

interface UsersRepository
{
    public function getUserById(int $id) : ? Users;
    public function GetUserByUsername(string $username) : ? Users;
    public function getUserByPassword(string $username, string $password) : ? Users;
    public function createUser(\stdClass $data) : int;
    public function updateUser(\stdClass $data) : bool;
    public function deleteUser(\stdClass $data) : bool;
}
