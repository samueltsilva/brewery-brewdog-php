<?php

namespace App\Http\Middleware;

use App\Exceptions\ExpiredTokenException;
use App\Exceptions\InvalidTokenException;
use App\Exceptions\NoTokenFoundException;
use App\Helpers\Helpers;
use Closure;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Log;

class Auth
{
    private $dateTime;

    public function __construct()
    {
        $this->dateTime = new \DateTime();
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws ExpiredTokenException
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        Log::info(
            'Middleware: Auth. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        if ( ! is_null($request->header("authorization")) )
            $token = Helpers::getToken($request->header("authorization"));
        else throw new NoTokenFoundException();

        $expirationDate = new \DateTime($token->expiresAt);
        if ( $expirationDate < $this->dateTime ) throw new ExpiredTokenException();

        return $next($request);
    }

}
