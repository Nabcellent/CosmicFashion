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
     * Stores a remember-me token for the user.
     *
     * @param int    $userID
     * @param string $selector
     * @param string $validator
     * @param string $expires
     *
     * @return mixed
     * @throws \Exception
     */
    public function rememberUser(int $userID, string $selector, string $validator, string $expires): mixed {
        $expires = new DateTime($expires);

        return DB::table('auth_tokens')->insert([
            'user_id'         => $userID,
            'selector'        => $selector,
            'hashedValidator' => $validator,
            'expires'         => $expires->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Returns the remember-me token info for a given selector.
     *
     * @param string $selector
     *
     * @return Collection
     */
    public function getRememberToken(string $selector): Collection {
        return DB::table('auth_tokens')->where('selector', $selector)->get();
    }

    /**
     * Updates the validator for a given selector.
     *
     * @param string $selector
     * @param string $validator
     *
     * @return int
     */
    public function updateRememberValidator(string $selector, string $validator): int {
        return DB::table('auth_tokens')->where('selector', $selector)->update([
            'hashedValidator' => hash('sha256', $validator),
            'expires'         => (new DateTime)->modify('+' . config('Auth')->rememberLength . ' seconds')
                ->format('Y-m-d H:i:s'),
        ]);
    }

    /**
     * Purges the 'auth_tokens' table of any records that are past
     * their expiration date already.
     */
    public function purgeOldRememberTokens() {
        $config = config('Auth');

        if(!$config->allowRemembering) return;

        DB::table('auth_tokens')->where('expires <=', date('Y-m-d H:i:s'))->delete();
    }

    /**
     * Removes all persistent login tokens (RememberMe) for a single user
     * across all devices they may have logged in with.
     *
     * @param int $id
     *
     * @return string|bool
     */
    public function purgeRememberTokens(int $id): string|bool {
        return DB::table('auth_tokens')->where('user_id', $id)->delete();
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
