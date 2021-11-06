<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PayPalCallback extends Model
{
    protected $table = 'paypal_callbacks';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     *  RELATIONSHIPS
     */
    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
