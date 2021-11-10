<?php

namespace App\Interfaces;

interface ContactRepositoryInterface
{
    public function findBy(array $data);
    public function store(array $data);
    public function update(array $data, $id);
    public function findById($id);
    public function delete($id);
}
