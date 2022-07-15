<?php

namespace App\Libraries;

use Illuminate\Support\Facades\Http;

class RestCommunication
{
    public static function sendGet(string $url, array $headers = null) : array
    {
        $accept = $headers["accept"] ?? null;
        $authorization = $headers["authorization"] ?? null;

        $responseIntegracao = Http::accept($accept)
            ->withToken($authorization)
            ->timeout(60)
            ->get($url);

        $response["statusCode"] = $responseIntegracao->status();
        $response["data"] = $responseIntegracao->body();

        return $response;
    }

}
