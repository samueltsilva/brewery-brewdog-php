<?php

namespace App\DTO;

use App\Models\Users;

class ReturnCreateUserDTO extends ReturnDTO
{
    protected $idUsers = 0;

    /**
     * @return int
     */
    public function getIdUsers(): int
    {
        return $this->idUsers;
    }

    /**
     * @param int $idUsers
     */
    public function setIdUsers(int $idUsers): void
    {
        $this->idUsers = $idUsers;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 201
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'idUsers' => $this->getIdUsers()
            ]
            : parent::retornarArray();
    }
}
