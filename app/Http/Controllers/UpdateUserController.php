<?php

namespace App\Http\Controllers;

use App\DTO\ReturnUpdateUserDTO;
use App\Interfaces\Service\UpdateUserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class UpdateUserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(UpdateUserService $updateUserService)
    {
        $this->service = $updateUserService;
        $this->DTO = new ReturnUpdateUserDTO();
    }

    public function update(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: UpdateUserController\update. Object received from Application Service: ',
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

        //Optionals to be updated
        if ( $request->has('username') )
            $data->username = (string) $request->input('username');

        if ( $request->has('password') )
            $data->password = md5($request->input('password'));

        if ( $request->has('firsName') )
            $data->first_name = (string) $request->input('firsName');

        if ( $request->has('lastName') )
            $data->last_name = (string) $request->input('lastName');

        if ( $request->has('address') )
            $data->address = (string) $request->input('address');

        if ( $request->has('number') )
            $data->number = (int) $request->input('number');

        if ( $request->has('status') )
            $data->number = (int) $request->input('number');

        if ( count((array) $data) === 1 )
        {
            $this->DTO->setStatusCode(400);
            $this->DTO->setCode(5008);
            $this->DTO->setMessage('There is no value to be updated. Please, try again with the respective values to update.');

            return \response()->json(
                $this->DTO->retornarArray(),
                $this->DTO->getStatusCode(),
                [],
                JSON_UNESCAPED_UNICODE
            );
        }

        //If everything's ok, go to the responsible service.
        $result = $this->service->updateUser($data);

        Log::info(
            'Controller: UpdateUserController\update. Object returned to Application Service: ',
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
