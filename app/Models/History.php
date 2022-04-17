<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'product_id', 
        'quantity', 
        'action_type'
    ];
}
