<?php

namespace App\Services;

use App\DTO\ReturnGetUserDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\BeersService;
use App\Interfaces\Service\GetUserService;
use App\Libraries\RestCommunication;
use Illuminate\Support\Facades\Config;

class BeersServiceImpl implements BeersService
{
    private $url;

    public function __construct()
    {
        $this->url = Config::get('constants.PUNK_API_v2');
    }

    public function getBeer(\stdClass $data): ReturnGetUserDTO
    {
        $response = RestCommunication::sendGet($this->url);
        $responseObject = json_decode($response['data']);

        echo '<pre>', print_r($responseObject, 1), '</pre>';exit();
    }

}
