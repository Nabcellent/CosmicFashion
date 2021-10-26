<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Login extends Model
{
    protected $table = 'auth_logins';

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
