<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model
{
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
        'username',
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
     * Get the user's gender in CAPS.
     *
     * @return string
     */
    public function getSpendAttribute(): string {
        return $this->orders()->whereIsPaid(true)->sum('amount');
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
    public function products(): HasMany {
        return $this->hasMany(Product::class);
    }
    public function orders(): HasMany {
        return $this->hasMany(Order::class);
    }
    public function ordersDetails(): HasManyThrough {
        return $this->hasManyThrough(OrdersDetail::class, Order::class);
    }
    public function wallet(): HasOne {
        return $this->hasOne(Wallet::class);
    }
    public function apiUser(): HasOne {
        return $this->hasOne(ApiUser::class);
    }



    /**
     * Checks to see if a user has been banned.
     *
     * @return bool
     */
    public function isBanned(): bool {
        return $this->status === 'banned';
    }

    public static function findEmail($email) {
        $user = User::whereEmail($email)->first();

        if(!is_null($user)) return $user;

        throw (new ModelNotFoundException)->setModel(
            __CLASS__, $email
        );
    }
}
