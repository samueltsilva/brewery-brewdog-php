<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnDeleteUserDTO;

interface DeleteUserService
{
    public function deleteUser(\stdClass $data) : ReturnDeleteUserDTO;
}
