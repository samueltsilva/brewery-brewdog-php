<?php

namespace App\Http\Controllers;

use App\DTO\ReturnCreateUserDTO;
use App\Interfaces\Service\CreateUserService;
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
        $this->DTO = new ReturnCreateUserDTO();
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
            'firstName' => 'required',
            'address' => 'required',
            'number' => 'required'
        ]);

        $data = new \stdClass();

        //Required
        $data->username = (string) $request->input('username');
        $data->password = md5($request->input('password'));
        $data->firstName = (string) $request->input('firstName');
        $data->address = (string) $request->input('address');
        $data->number = (int) $request->input('number');
        $data->status = 1;

        //Optionals
        $data->lastName = $request->has('lastName')
            ? $request->input('lastName')
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
