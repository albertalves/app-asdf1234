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
        return $this->entity->with('history')->orderBy('id', 'desc')->paginate(10);
    }

    public function findByUuid(string $uuid)
    {
        return $this->entity
                    ->where('uuid', '=', $uuid)
                    ->firstOrFail();
    }

    public function findById(int $id)
    {
        return $this->entity->find($id);
    }

    public function create(array $attributes)
    {
        return $this->entity->create($attributes);
    }

    public function update(array $attributes, string $uuid)
    {
        return $this->findByUuid($uuid)->update($attributes);
    }
}