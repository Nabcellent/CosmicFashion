<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'payment_type_id',
        'amount',
        'status',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function paymentType(): BelongsTo {
        return $this->belongsTo(PaymentType::class);
    }
    public function ordersDetails(): HasMany {
        return $this->hasMany(OrdersDetail::class);
    }
}
