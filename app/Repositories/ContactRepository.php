<?php

namespace App\Repositories;

use App\Interfaces\ContactRepositoryInterface;
use App\Models\Contact;
use Illuminate\Database\Eloquent\Collection;

class ContactRepository implements ContactRepositoryInterface
{
    protected $contact;

    public function __construct()
    {
        $this->contact = new Contact();
    }

    public function findBy(array $data)
    {
        $contacts = $this->contact;
        if (isset($data['user_id']) && $data['user_id'] != null) {
            $contacts = $contacts->where('user_id', $data['user_id']);
        }
        if (isset($data['name']) && $data['name'] != null) {
            $contacts = $contacts->where('name', 'like', "%{$data['name']}%");
        }
        if (isset($data['orderby']) && $data['orderby'] != '') {
            $contacts = $contacts->orderBy($data['orderby']);
        }
        return $contacts->get();
    }
    public function store(array $data): Contact
    {
        return $this->contact->create($data);
    }
    public function findById($id): Contact
    {
        return $this->contact->find($id);
    }
    public function update(array $data, $id): Contact
    {
        $contact = $this->findById($id);

        $contact->fill($data);
        $contact->save();

        return $contact;
    }
    public function delete($id)
    {
        return $this->contact->where('id', $id)->delete($id);
    }
}
