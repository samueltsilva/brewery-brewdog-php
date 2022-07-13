<?php

namespace App\DTO;

use App\Models\Users;

class ReturnUpdateUserDTO extends ReturnDTO
{
    protected $updated = false;

    /**
     * @return bool
     */
    public function getUpdated(): bool
    {
        return $this->updated;
    }

    /**
     * @param bool $updated
     */
    public function setUpdated(bool $updated): void
    {
        $this->updated = $updated;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 201
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'updated' => $this->getUpdated()
            ]
            : parent::retornarArray();
    }
}
