<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnCreateUserDTO;

interface CreateUserService
{
    public function createUser(\stdClass $data) : ReturnCreateUserDTO;
}
