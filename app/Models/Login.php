<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Nabz\Models\DB;

class Login extends Model
{
    protected $table = 'auth_logins';

    /**
     * RELATIONSHIP FUNCTIONS
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }


    /**
     * Removes all persistent login tokens (RememberMe) for a single user
     * across all devices they may have logged in with.
     *
     * @param int $id
     *
     * @return void
     */
    public function updateLogoutTime(int $id) {
        DB::table('auth_logins')->where('user_id', $id)->orderBy('logged_in_at', 'DESC')->limit(1)
            ->update(['logged_out_at' => Carbon::now()->toDateTimeString()]);
    }
}
