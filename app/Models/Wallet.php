<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Wallet extends Model
{
    protected $fillable = [
        'user_id',
        'balance'
    ];


    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the wallet's transactions.
     */
    public function transaction(): MorphMany {
        return $this->morphMany(Transaction::class, 'payable');
    }
}
