<?php

namespace App\DTO;

use App\Models\Users;

class ReturnGetUserDTO extends ReturnDTO
{
    protected $user;

    /**
     * @return Users
     */
    public function getUser(): Users
    {
        return $this->user;
    }

    /**
     * @param Users $user
     */
    public function setUser(Users $user): void
    {
        $this->user = $user;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 200
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'user' => $this->getUser()
            ]
            : parent::retornarArray();
    }
}
