<?php

namespace App\Services;

use App\Interfaces\AddressRepositoryInterface;
use App\Interfaces\ContactRepositoryInterface;
use App\Interfaces\PhoneNumberRepositoryInterface;

class ContactService
{
    protected $contactRepository;
    protected $addressRepository;
    protected $phoneNumberRepository;

    public function __construct(
        ContactRepositoryInterface $contactRepository,
        AddressRepositoryInterface $addressRepository,
        PhoneNumberRepositoryInterface $phoneNumberRepository
    ) {
        $this->contactRepository = $contactRepository;
        $this->addressRepository = $addressRepository;
        $this->phoneNumberRepository = $phoneNumberRepository;
    }
    public function add(array $data)
    {
        $contact = $this->contactRepository->store($data + ['user_id' => auth()->id()]);

        $this->setNumbers($data['numbers'], $contact);
        $this->setAddressess($data, $contact);

        return $contact;
    }

    public function update(array $data, $id)
    {
        $contact = $this->contactRepository->update($data, $id);

        $this->setNumbers($data['numbers'], $contact);
        $this->setAddressess($data, $contact);
    }


    protected function setNumbers($numbers, $contact)
    {
        $contact->phoneNumbers()->delete();

        foreach ($numbers as $number) {
            $this->phoneNumberRepository->store([
                'number' => $number,
                'contact_id' => $contact->id,
            ]);
        }
    }

    protected function setAddressess($data, $contact)
    {
        $contact->addresses()->delete();

        foreach ($data['zip_code'] as $key => $value) {
            $this->addressRepository->store([
                'zip_code' => $data['zip_code'][$key],
                'street' => $data['street'][$key],
                'number' => $data['number'][$key],
                'district' => $data['district'][$key],
                'city' => $data['city'][$key],
                'uf' => $data['uf'][$key],
                'contact_id' => $contact->id,
            ]);
        }
    }
}
