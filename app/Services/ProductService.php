<?php

namespace App\Services;

use App\Jobs\HistoryJob;
use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->productRepository->getAll();
    }

    /**
     * @param  string $uuid
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function find(string $uuid)
    {
        return $this->productRepository->find($uuid);
    }

    /**
     * @param  array $attributes
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function create(array $attributes)
    {
        return $this->productRepository->create($attributes);
    }

    /**
     * @param  array $attributes
     * @param  string $uuid
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function update(array $attributes, string $uuid)
    {
        if (! $this->find($uuid)) {
            throw new \Exception('Produto não encontrado.');
        }

        return $this->productRepository->update($attributes, $uuid);
    }
}