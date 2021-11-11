<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class MpesaStkCallback extends Model
{
    protected $guarded = [];

    public function request(): BelongsTo {
        return $this->belongsTo(MpesaStkRequest::class, 'checkout_request_id', 'checkout_request_id');
    }
    /**
     * Get the callback's transactions.
     */
    public function transaction(): MorphMany {
        return $this->morphMany(Transaction::class, 'payable');
    }
}
