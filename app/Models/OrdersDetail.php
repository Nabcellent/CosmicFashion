<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Nabz\Models\DB;

class OrdersDetail extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'product_id',
        'price',
        'quantity',
        'total',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
    public function product(): BelongsTo {
        return $this->belongsTo(Product::class);
    }
}
