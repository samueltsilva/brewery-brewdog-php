<?php

namespace App\DTO;

class ReturnLoginDTO extends ReturnDTO
{
    protected $auth = array();

    public function __construct()
    {
        parent::__construct();
        $this->auth = [
            'token' => '',
            'type' => '',
            'expiresAt' => ''
        ];
    }

    /**
     * @return array|string[]
     */
    public function getAuth(): array
    {
        return $this->auth;
    }

    /**
     * @param array|string[] $auth
     */
    public function setAuth(array $auth): void
    {
        $this->auth = $auth;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 201
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'auth' => $this->getAuth()
            ]
            : parent::retornarArray();
    }
}
