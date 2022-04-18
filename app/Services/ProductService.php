<?php

namespace App\Services;

use App\Enum\ActionType;
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
    public function findByUuid(string $uuid)
    {
        return $this->productRepository->findByUuid($uuid);
    }

    /**
     * @param  int $id
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function findById(int $id)
    {
        return $this->productRepository->findById($id);
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
        if (! $this->findByUuid($uuid)) {
            throw new \Exception('Produto não encontrado.');
        }

        return $this->productRepository->update($attributes, $uuid);
    }

    /**
     * @param  array $attributes
     * 
     * @return void
     */
    public function updateQuantity(array $attributes): void
    {
        $newProduct = [];
        $product = $this->findById($attributes['product_id']);

        if (!$product) {
            throw new \Exception('Produto não encontrado.');
        }

        if ($attributes['action_type'] == ActionType::ADDED) {
            $newProduct['quantity'] = $product['quantity'] + $attributes['quantity'];
        } else {
            $newProduct['quantity'] = $product['quantity'] - $attributes['quantity'];
        }

        $this->update($newProduct, $product['uuid']);
    }
}