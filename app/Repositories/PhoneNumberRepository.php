<?php

namespace App\Repositories;

use App\Interfaces\PhoneNumberRepositoryInterface;
use App\Models\PhoneNumber;

class PhoneNumberRepository implements PhoneNumberRepositoryInterface
{
    protected $phoneNumber;

    public function __construct()
    {
        $this->phoneNumber = new PhoneNumber();
    }

    public function store(array $data): PhoneNumber
    {
        return $this->phoneNumber->create($data);
    }
}
