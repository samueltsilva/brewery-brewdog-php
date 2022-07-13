<?php

namespace App\Services;

use App\DTO\ReturnGetUserDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\GetUserService;

class GetUserServiceImpl implements GetUserService
{
    private $DTO;
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->DTO = new ReturnGetUserDTO();
    }

    public function getUser(\stdClass $data): ReturnGetUserDTO
    {
        $result = ! is_null($data->idUsers)
            ? $this->usersRepository->getUserById($data->idUsers)
            : $this->usersRepository->GetUserByUsername($data->username);

        if ( empty($result)  )
        {
            $this->DTO->setCode(5006);
            $this->DTO->setMessage('No user found for the key provided.');

            return $this->DTO;
        }

        $this->DTO->setStatusCode(200);
        $this->DTO->setMessage('User found successfully.!');
        $this->DTO->setCode(9001);
        $this->DTO->setUser($result);

        return $this->DTO;

    }

}
