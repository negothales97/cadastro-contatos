<?php

namespace App\Repositories;

use App\Interfaces\AddressRepositoryInterface;
use App\Models\Address;

class AddressRepository implements AddressRepositoryInterface
{
    protected $address;

    public function __construct()
    {
        $this->address = new Address();
    }

    public function store(array $data): Address
    {
        return $this->address->create($data);
    }
}
