<?php

namespace App\Observers;

use App\Enum\ActionType;
use App\Jobs\HistoryJob;
use App\Models\Product;

class ProductObserver
{
    public function created(Product $product)
    {
        $attributes = [
            'product_id' => $product['id'],
            'quantity' => $product['quantity'],
            'action_type' => ActionType::INITIAL
        ];

        HistoryJob::dispatch($attributes);
    }
}
