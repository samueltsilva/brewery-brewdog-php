<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidTokenException;
use App\Helpers\Helpers;
use Closure;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;

class Auth
{
    const TOKEN_TESTE = "Bearer brenner";

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info(
            'Middleware: Auth. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        $token = Helpers::getToken($request->header("authorization"));

        echo '<pre>', print_r($token, 1), '</pre>';exit();
        $tokensTeste = $this->getTokensTeste();
        if(!in_array($token, $tokensTeste)){
            throw new InvalidTokenException();
        }

        return $next($request);
    }

}
