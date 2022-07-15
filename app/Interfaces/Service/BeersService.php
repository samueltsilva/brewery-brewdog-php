<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnGetUserDTO;

interface BeersService
{
    public function getBeer(\stdClass $data) : ReturnGetUserDTO;
}
