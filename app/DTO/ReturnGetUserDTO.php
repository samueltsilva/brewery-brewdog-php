<?php

namespace App\DTO;

use App\Models\Users;

class ReturnGetUserDTO extends ReturnDTO
{
    protected $user;

    /**
     * @return array
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * @param array $user
     */
    public function setUser(Users $user): void
    {
        $this->user = $user;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 201
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'user' => $this->getUser()
            ]
            : parent::retornarArray();
    }
}