<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MpesaStkCallback extends Model
{
    protected $guarded = [];

    public function request(): BelongsTo {
        return $this->belongsTo(MpesaStkRequest::class, 'checkout_request_id', 'checkout_request_id');
    }
}
