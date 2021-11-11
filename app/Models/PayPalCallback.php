<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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
    /**
     * Get the callback's transactions.
     */
    public function transaction(): MorphMany {
        return $this->morphMany(Transaction::class, 'payable');
    }
}
