<?php

namespace App\Interfaces\Repository;

use App\Models\Users;

interface UsersRepository
{
    public function getUserByPassword(string $username, string $password) : ? Users;
    public function createUser(\stdClass $data) : int;
}
