<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Contracts\Container\Container;
use Illuminate\Support\Facades\Config;

class Helpers
{
    /**
     * @throws \Exception
     */
    public static function addHours(\DateTime $date, int $hours, string $format) : string
    {
        return $date->add(new \DateInterval('PT' . $hours . 'H'))->format($format);
    }

    public static function getToken($token) : \stdClass
    {
        return self::decodeToken(str_replace('Bearer ', '', $token));
    }

    public static function formatarData(string $data){
       $data = new \DateTime($data);
       return $data->format('d/m/Y H:i:s');
    }

    public static function formatarDataPadrao(string $data){
        $data = new \DateTime($data);
        return $data->format('Y-m-d H:i:s');
    }

    public static function formatarAnoMesDia(string $data){
        $data = new \DateTime($data);
        return $data->format('d/m/Y');
    }

    public static function decodeToken($token) : \stdClass
    {
        return JWT::decode(
            $token,
            new Key(Config::get('constants.JWT_SECRET'), 'HS256')
        );
    }



}
