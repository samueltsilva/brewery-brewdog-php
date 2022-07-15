<?php

namespace App\Services;

use App\DTO\ReturnDeleteUserDTO;
use App\Interfaces\Repository\UsersRepository;
use App\Interfaces\Service\DeleteUserService;

class DeleteUserServiceImpl implements DeleteUserService
{
    private $DTO;
    private $usersRepository;

    public function __construct(UsersRepository $usersRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->DTO = new ReturnDeleteUserDTO();
    }

    public function deleteUser(\stdClass $data): ReturnDeleteUserDTO
    {
        $resultUser = $this->usersRepository->getUserById($data->idUsers);

        if ( empty($resultUser)  )
        {
            $this->DTO->setStatusCode(406);
            $this->DTO->setCode(5006);
            $this->DTO->setMessage('No user found for the key provided.');

            return $this->DTO;
        }

        $result = $this->usersRepository->deleteUser($data);

        if ( ! $result )
        {
            $this->DTO->setCode(5010);
            $this->DTO->setMessage('The database reported an error while deleting the user.');

            return $this->DTO;
        }

        $this->DTO->setStatusCode(201);
        $this->DTO->setMessage('The user was deleted successfully!');
        $this->DTO->setCode(9001);
        $this->DTO->setDeleted(true);

        return $this->DTO;

    }

}
