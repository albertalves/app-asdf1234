<?php

namespace App\Models;

use App\Models\Traits\Uuid;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Uuid;
    
    protected $fillable = [
        'id',
        'uuid', 
        'name', 
        'quantity'
    ];

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
