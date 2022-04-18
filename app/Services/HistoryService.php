<?php

namespace App\Services;

use App\Enum\ActionType;
use App\Models\Product;
use App\Repositories\HistoryRepository;

class HistoryService
{
    protected $historyRepository;

    /**
     * @param HistoryRepository $historyRepository
     */
    public function __construct(HistoryRepository $historyRepository)
    {
        $this->historyRepository = $historyRepository;
    }

    /**
     * @param  array $attributes
     * 
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function create($attributes)
    {
        $product = app()->make(ProductService::class)->findById($attributes['product_id']);
 
        if (!$product) {
            throw new \Exception('Produto não encontrado.');
        }
        
        if ($attributes['action_type'] == ActionType::REMOVED) {
            $this->canRemove($product, $attributes);
        }
        
        $attributes['product_id'] = $product->id;
        
        return $this->historyRepository->create($attributes);
    }

    public function canRemove(Product $product, array $attributes)
    {
        $value = $product['quantity'] - $attributes['quantity'];

        if ($value == -1) {
            throw new \Exception('A quantidade do produto não pode ser negativa');
        }
    }
}