<?php

namespace App\Services;

use App\DTO\ReturnCreateUserDTO;
use App\DTO\ReturnLoginDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\CreateUserService;

class CreateUserServiceImpl implements CreateUserService
{
    private $DTO;
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->DTO = new ReturnCreateUserDTO();
    }

    public function createUser(\stdClass $data): ReturnCreateUserDTO
    {
        $result = $this->usersRepository->createUser($data);

        if ( $result <= 0 )
        {
            $this->DTO->setCode(5004);
            $this->DTO->setMessage('The database reported an error while creating the user.');

            return $this->DTO;
        }

        $this->DTO->setStatusCode(201);
        $this->DTO->setMessage('The user was created successfully!');
        $this->DTO->setCode(9001);
        $this->DTO->setIdUsers($result);

        return $this->DTO;

    }

}
