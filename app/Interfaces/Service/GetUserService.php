<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnGetUserDTO;

interface GetUserService
{
    public function getUser(\stdClass $data) : ReturnGetUserDTO;
}
