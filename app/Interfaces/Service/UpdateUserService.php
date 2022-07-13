<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnUpdateUserDTO;

interface UpdateUserService
{
    public function updateUser(\stdClass $data) : ReturnUpdateUserDTO;
}
