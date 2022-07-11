<?php

namespace App\Interfaces\Service;

use App\DTO\RetornoLoginDTO;

interface LoginService
{
    public function loginUser(\stdClass $data) : RetornoLoginDTO;
}
