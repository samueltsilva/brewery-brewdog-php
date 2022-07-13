<?php

namespace App\Services;

use App\DTO\ReturnUpdateUserDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\UpdateUserService;

class UpdateUserServiceImpl implements UpdateUserService
{
    private $DTO;
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->DTO = new ReturnUpdateUserDTO();
    }

    public function updateUser(\stdClass $data): ReturnUpdateUserDTO
    {
        $resultUser = $this->usersRepository->getUserById($data->idUsers);

        if ( empty($resultUser)  )
        {
            $this->DTO->setStatusCode(406);
            $this->DTO->setCode(5006);
            $this->DTO->setMessage('No user found for the key provided.');

            return $this->DTO;
        }

        $result = $this->usersRepository->updateUser($data);

        if ( ! $result )
        {
            $this->DTO->setCode(5009);
            $this->DTO->setMessage('The database reported an error while updating the user.');

            return $this->DTO;
        }

        $this->DTO->setStatusCode(201);
        $this->DTO->setMessage('The user was updated successfully!');
        $this->DTO->setCode(9001);
        $this->DTO->setUpdated(true);

        return $this->DTO;

    }

}
