<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Transaction extends Model
{
    protected $fillable = [
        'payable_id',
        'payable_type',
        'type',
        'amount',
        'description',
        'status',
    ];

    /**
     * Get the parent payable model (Mpesa, PayPal or Wallet).
     */
    public function payable(): MorphTo {
        return $this->morphTo();
    }
}
