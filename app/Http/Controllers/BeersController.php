<?php

namespace App\Http\Controllers;

use App\DTO\ReturnGetUserDTO;
use App\Interfaces\Service\BeersService;
use App\Interfaces\Service\GetUserService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BeersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    private $service;
    private $DTO;

    public function __construct(BeersService $beersService)
    {
        $this->service = $beersService;
        $this->DTO = new ReturnGetUserDTO();
    }

    public function get(Request $request) : JsonResponse
    {
        Log::info(
            'Controller: BeersController\get. Object received from Application Service: ',
            ['Object' => $request->all()]
        );



        $data = new \stdClass();

        $data->string = $request->input('brewered_before');
        $data->string .= $request->input('abv_gt');

        echo '<pre>', print_r($request->query, 1), '</pre>';exit();

//        $data = $this->proccessQuery($request);


        //If everything's ok, go to the responsible service.
        $result = $this->service->getBeer($data);

        Log::info(
            'Controller: BeersController\get. Object returned to Application Service: ',
            ['Object' => $result->retornarArray()]
        );

        return \response()->json(
            $result->retornarArray(),
            $result->getStatusCode(),
            [],
            JSON_UNESCAPED_UNICODE
        );
    }

    private function proccessQuery(Request $request)
    {


    }
}
