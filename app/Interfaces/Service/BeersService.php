<?php

namespace App\Interfaces\Service;

use App\DTO\ReturnBeerDTO;

interface BeersService
{
    public function getBeer(string $query) : ReturnBeerDTO;
}
