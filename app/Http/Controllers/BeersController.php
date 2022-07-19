<?php

namespace App\Http\Controllers;

use App\DTO\ReturnGetUserDTO;
use App\Interfaces\Service\BeersService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Symfony\Component\ErrorHandler\Error\FatalError;

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

        $queryResult = $this->proccessQuery($request->query->all(), $request->query->count());

        try {
            //If everything's ok, go to the responsible service.
            $result = $this->service->getBeer($queryResult);
        } catch (\Exception | \PDOException | FatalError $exception)
        {
            $this->DTO->setStatusCode(500);
            $this->DTO->setMessage($exception->getMessage());
            $this->DTO->setCode(5012);

            return \response()->json(
                $this->DTO->retornarArray(),
                $this->DTO->getStatusCode(),
                [],
                JSON_UNESCAPED_UNICODE
            );
        }

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

    private function proccessQuery(array $query, int $count) : string
    {
        $queryResult = '?';

        foreach ($query as $key => $value)
        {
            if ( $count !== 0 )
            {
                $queryResult .= $key . '=' . $value . '&';
                $count--;
            }
        }

        return $queryResult;
    }
}
