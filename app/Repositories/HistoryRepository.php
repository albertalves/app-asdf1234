<?php

namespace App\Repositories;

use App\Models\History;

class HistoryRepository
{
    protected $entity;

    public function __construct(History $p)
    {
        $this->entity = $p;
    }

    public function create(array $attributes)
    {
        return $this->entity->create($attributes);
    }

    // public function update(array $attributes, string $uuid)
    // {
    //     return $this->find($uuid)->update($attributes);
    // }
}