<?php

namespace App\Services;

use App\DTO\ReturnBeerDTO;
use App\Interfaces\Service\BeersService;
use App\Libraries\RestCommunication;
use Illuminate\Support\Facades\Config;

class BeersServiceImpl implements BeersService
{
    private $url;
    private $DTO;

    public function __construct()
    {
        $this->url = Config::get('constants.PUNK_API_v2');
        $this->DTO = new ReturnBeerDTO();
    }

    public function getBeer(string $query): ReturnBeerDTO
    {
        $this->url .= $query;

        $response = RestCommunication::sendGet($this->url);
        $responseObject = json_decode($response['data']);

        if ( $response['statusCode'] !== 200 )
        {
            $this->DTO->setStatusCode($response['statusCode']);
            $this->DTO->setCode(5011);
            $this->DTO->setMessage('An error has occurred while trying to connect to Punk API v2. Please, try again later.');

        }

        $this->DTO->setStatusCode(200);
        $this->DTO->setCode(5013);
        $this->DTO->setMessage("You got your beers successfully!");
        $this->DTO->setBeers($responseObject);

        return $this->DTO;

    }

}
