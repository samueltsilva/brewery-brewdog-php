<?php

namespace App\Http\Controllers;

use App\DTO\ReturnLoginDTO;
use App\Interfaces\Service\CreateUserService;
use App\Interfaces\Service\LoginService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class CreateUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(CreateUserService $createUserService)
    {
        $this->service = $createUserService;
        $this->DTO = new ReturnLoginDTO();
    }

    public function create(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: CreateUserController\create. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        //Validations
        $this->validate($request,
        [
            'username' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'address' => 'required',
            'number' => 'required'
        ]);

        $data = new \stdClass();

        //Required
        $data->username = (string) $request->input('username');
        $data->password = md5($request->input('password'));
        $data->first_name = (string) $request->input('first_name');
        $data->address = (string) $request->input('address');
        $data->number = (int) $request->input('number');
        $data->status = 1;

        //Optionals
        $data->last_name = $request->has('last_name')
            ? $request->input('last_name')
            : null;

        //If everything's ok, go to the responsible service.
        $result = $this->service->createUser($data);

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
