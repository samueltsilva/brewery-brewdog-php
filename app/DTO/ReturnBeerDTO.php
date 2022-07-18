<?php

namespace App\DTO;

use App\Models\Users;

class ReturnBeerDTO extends ReturnDTO
{
    protected $beers = array();

    /**
     * @return array
     */
    public function getBeers(): array
    {
        return $this->beers;
    }

    /**
     * @param array $beers
     */
    public function setBeers(array $beers): void
    {
        $this->beers = $beers;
    }

    public function retornarArray() : array
    {
        return $this->getStatusCode() === 200
            ?  [
            'message' => $this->getMessage(),
            'internalCode' => $this->getCode(),
            'beers' => $this->getBeers()
            ]
            : parent::retornarArray();
    }
}
