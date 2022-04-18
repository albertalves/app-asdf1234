<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $fillable = [
        'product_id', 
        'quantity', 
        'action_type'
    ];

    protected $appends = [
        'date_formatted',
        'time_formatted',
    ];
    /**
     * @return mixed
     */
    public function getDateFormattedAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('d/m/Y');
    }

    /**
     * @return mixed
     */
    public function getTimeFormattedAttribute(): string
    {
        return Carbon::parse($this->created_at)->format('H:i:s');
    }
}
