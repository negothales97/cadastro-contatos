<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository implements CategoryRepositoryInterface
{
    protected $category;

    public function __construct()
    {
        $this->category = new Category();
    }
    public function getAll(): Collection
    {
        return $this->category->get();
    }
    public function store(array $data): Category
    {
        return $this->category->create($data);
    }
}
