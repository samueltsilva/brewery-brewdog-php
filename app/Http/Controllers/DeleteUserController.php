<?php

namespace App\Http\Controllers;

use App\DTO\ReturnDeleteUserDTO;
use App\Interfaces\Service\DeleteUserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class DeleteUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(DeleteUserService $deleteUserService)
    {
        $this->service = $deleteUserService;
        $this->DTO = new ReturnDeleteUserDTO();
    }

    /**
     * @throws \Illuminate\Validation\ValidationException
     */
    public function delete(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: DeleteUserController\delete. Object received from Application Service: ',
            ['Object' => $request->all()]
        );

        //Validations
        $this->validate($request,
        [
            'idUsers' => 'required'
        ]);

        $data = new \stdClass();

        //Required
        $data->idUsers = (int) $request->input('idUsers');

        //If everything's ok, go to the responsible service.
        $result = $this->service->deleteUser($data);

        Log::info(
            'Controller: DeleteUserController\delete. Object returned to Application Service: ',
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
