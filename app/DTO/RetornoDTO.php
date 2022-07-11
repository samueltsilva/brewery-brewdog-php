<?php

namespace App\DTO;

class RetornoDTO
{
    protected $statusCode;
    protected $mensagem;
    protected $codigoRetorno;

    public function __construct()
    {
        $this->setStatusCode(500);
        $this->setMessage('Generic error.');
        $this->setCode(5000);
    }

    /**
     * @return mixed
     */
    public function getStatusCode() : int
    {
        return $this->statusCode;
    }

    /**
     * @return mixed
     */
    public function getMessage() : string
    {
        return $this->mensagem;
    }

    /**
     * @return mixed
     */
    public function getCode() : int
    {
        return $this->codigoRetorno;
    }

    /**
     * @param mixed $statusCode
     * @return RetornoDTO
     */
    public function setStatusCode(int $statusCode) : void
    {
        $this->statusCode = $statusCode;
    }

    /**
     * @param mixed $mensagem
     * @return RetornoDTO
     */
    public function setMessage(string $mensagem) : void
    {
        $this->mensagem = $mensagem;
    }

    /**
     * @param mixed $codigoRetorno
     */
    public function setCode(int $codigoRetorno): void
    {
        $this->codigoRetorno = $codigoRetorno;
    }

    public function retornarArray() : array
    {
        return [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode()
        ];
    }
}
