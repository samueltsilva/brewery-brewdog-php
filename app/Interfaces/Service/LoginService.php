<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnLoginDTO;

interface LoginService
{
    public function loginUser(\stdClass $data) : ReturnLoginDTO;
}
