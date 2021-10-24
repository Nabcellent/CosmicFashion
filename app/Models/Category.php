<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];


    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function subCategories(): HasMany {
        return $this->hasMany(SubCategory::class);
    }
}
