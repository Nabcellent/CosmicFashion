<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class SubCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function category(): BelongsTo {
        return $this->belongsTo(Category::class);
    }
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
    public function ordersDetails(): HasManyThrough {
        return $this->hasManyThrough(OrdersDetail::class, Product::class);
    }
}
