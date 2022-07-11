<?php

namespace App\Services;

use App\DTO\RetornoLoginDTO;
use App\Helpers\Helpers;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\LoginService;
use App\Models\Users;
use Firebase\JWT\JWT;
use Illuminate\Support\Facades\Config;
use Monolog\Test\TestCase;

class LoginServiceImpl implements LoginService
{
    private $DTO;
    private $usersRepository;
    private $dateTime;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->DTO = new RetornoLoginDTO();
        $this->dateTime = new \DateTime();
    }


    /**
     * @throws \Exception
     */
    public function loginUser(\stdClass $data): RetornoLoginDTO
    {
        $result = $this->usersRepository->getUserByPassword($data->username, $data->password);

        if ( empty($result) )
        {
            $this->DTO->setStatusCode(404);
            $this->DTO->setCode(5001);
            $this->DTO->setMessage('Incorrect usarname or password.');

            return $this->DTO;
        }

        $auth = $this->generateToken($result);

        $this->DTO->setStatusCode(201);
        $this->DTO->setCode(9000);
        $this->DTO->setMessage('Authentication performed successfully.');
        $this->DTO->setAuth($auth);

        return $this->DTO;

    }

    /**
     * @throws \Exception
     */
    private function generateToken(Users $result) : array
    {
        $expireDate = Helpers::addHours($this->dateTime, 2, 'Y:m:d H:i:s');

        $tokenPayload = array(
            'idUsers' => $result->getAttribute('id_users'),
            'username' => $result->getAttribute('username'),
            'expiresAt' => $expireDate,
            'type' => Config::get('constants.TOKEN_TYPE')
        );

        $token = JWT::encode($tokenPayload, Config::get('constants.JWT_SECRET'), 'HS256');

        return array(
            'token' => $token,
            'type' => Config::get('constants.TOKEN_TYPE'),
            'expiresAt' => $expireDate
        );
    }

}
