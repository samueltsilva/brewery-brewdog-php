<?php

namespace App\Http\Controllers;

use App\DTO\ReturnGetUserDTO;
use App\Interfaces\Service\GetUserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class GetUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(GetUserService $getUserService)
    {
        $this->service = $getUserService;
        $this->DTO = new ReturnGetUserDTO();
    }

    public function get(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: UserController\get. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        $data = new \stdClass();

        $data->idUsers = $request->has('idUsers')
            ? (int) $request->input('idUsers')
            : null;

        $data->username = $request->has('username')
            ? (string) $request->input('username')
            : null;

        if (
            (! $request->has('idUsers') && ! $request->has('username'))
            || ($request->has('idUsers') && $request->has('username'))
        ) {
            $this->DTO->setStatusCode(400);
            $this->DTO->setCode(5005);
            $this->DTO->setMessage('You need to provide one user search parameter in Get query ( (int) idUsers or (string) username ).');

            return \response()->json(
                $this->DTO->retornarArray(),
                $this->DTO->getStatusCode(),
                [],
                JSON_UNESCAPED_UNICODE
            );
        }

        //If everything's ok, go to the responsible service.
        $result = $this->service->getUser($data);

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
