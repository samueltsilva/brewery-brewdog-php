<?php

namespace App\Http\Controllers;

use App\DTO\ReturnLoginDTO;
use App\Interfaces\Service\LoginService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class LoginController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(LoginService $loginService)
    {
        $this->service = $loginService;
        $this->DTO = new ReturnLoginDTO();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: LoginController\login. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        $this->validate($request,
        [
            'username' => 'required',
            'password' => 'required'
        ]);

        $data = new \stdClass();
        $data->username = $request->input('username');
        $data->password = md5($request->input('password'));

        $result = $this->service->loginUser($data);

        Log::info(
            'Controller: LoginController\login. Object returned to Application Service: ',
            ['Object' => $result->retornarArray()]
        );

        return \response()->json(
            $result->retornarArray(),
            $result->getStatusCode(),
            [],
            JSON_UNESCAPED_UNICODE
        );
    }
}
