<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MpesaStkRequest extends Model
{
    protected $guarded = [];

    public function response(): HasOne {
        return $this->hasOne(MpesaStkCallback::class, 'checkout_request_id', 'checkout_request_id');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo {
        return $this->belongsTo(Order::class);
    }
}
