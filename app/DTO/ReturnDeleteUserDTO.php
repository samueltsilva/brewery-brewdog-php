<?php

namespace App\DTO;

use App\Models\Users;

class ReturnDeleteUserDTO extends ReturnDTO
{
    protected $deleted = false;

    /**
     * @return bool
     */
    public function getDeleted(): bool
    {
        return $this->deleted;
    }

    /**
     * @param bool $deleted
     */
    public function setDeleted(bool $deleted): void
    {
        $this->deleted = $deleted;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 201
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'deleted' => $this->getDeleted()
            ]
            : parent::retornarArray();
    }
}
