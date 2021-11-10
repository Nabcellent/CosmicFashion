<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ApiUser extends Model
{
    protected $fillable = [
        'user_id',
        'username',
        'key',
    ];

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public static function findByUsername($username): ApiUser|bool {
        return self::whereUsername($username)->first() ?? false;
    }
}
