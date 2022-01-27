<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function users(): HasMany {
        return $this->hasMany(User::class);
    }
}
