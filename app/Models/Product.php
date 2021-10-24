<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'sub_category_id',
        'name',
        'image',
        'description',
        'price',
        'discount',
        'stock',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function subCategory(): BelongsTo {
        return $this->belongsTo(SubCategory::class)->with('category');
    }

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function images(): HasMany {
        return $this->hasMany(ProductsImage::class);
    }
}
