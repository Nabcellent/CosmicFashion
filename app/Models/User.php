<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model {
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'role_id',
        'email',
        'image',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['password'];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute(): string {
        return ucwords("{$this->first_name} {$this->last_name}");
    }
    /**
     * Get the user's gender in CAPS.
     *
     * @param string $value
     * @return string
     */
    public function getGenderAttribute(string $value): string {
        return ucfirst($value);
    }

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function role(): BelongsTo {
        return $this->belongsTo(Role::class);
    }
    public function logins(): HasMany {
        return $this->hasMany(Login::class);
    }
    public function cart(): HasMany {
        return $this->hasMany(Cart::class);
    }
    public function mpesaStkRequests(): HasMany {
        return $this->hasMany(MpesaStkRequest::class);
    }



    public function apiUser(): HasOne {
        return $this->hasOne(ApiUser::class);
    }
}
