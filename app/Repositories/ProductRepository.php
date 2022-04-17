<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $entity;

    public function __construct(Product $product)
    {
        $this->entity = $product;
    }

    public function getAll()
    {
        return $this->entity->all();
    }

    public function find(string $uuid)
    {
        return $this->entity
                    ->where('uuid', '=', $uuid)
                    ->firstOrFail();
    }

    public function create(array $attributes)
    {
        return $this->entity->create($attributes);
    }

    public function update(array $attributes, string $uuid)
    {
        return $this->find($uuid)->update($attributes);
    }
}