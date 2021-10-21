<?php namespace App\Models;

use CodeIgniter\Model;
use DateTime;
use Illuminate\Support\Carbon;

class LoginModel extends Model {
    protected $table = 'auth_logins';
    protected $primaryKey = 'id';

    protected $returnType = 'object';
    protected $useSoftDeletes = false;

    protected $allowedFields = [
        'ip_address',
        'email',
        'user_id',
        'logged_in_at',
        'logged_out_at',
        'success'
    ];

    protected $useTimestamps = false;

    protected $validationRules = [
        'ip_address'   => 'required',
        'email'        => 'required',
        'user_id'      => 'permit_empty|integer',
        'logged_in_at' => 'required|valid_date',
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;

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

        return $this->db->table('auth_tokens')->insert([
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
     * @return mixed
     */
    public function getRememberToken(string $selector): mixed {
        return $this->db->table('auth_tokens')->where('selector', $selector)->get()->getRow();
    }

    /**
     * Updates the validator for a given selector.
     *
     * @param string $selector
     * @param string $validator
     *
     * @return mixed
     */
    public function updateRememberValidator(string $selector, string $validator) {
        return $this->db->table('auth_tokens')->where('selector', $selector)->update([
                'hashedValidator' => hash('sha256', $validator),
                'expires'         => (new \DateTime)->modify('+' . config('Auth')->rememberLength . ' seconds')
                    ->format('Y-m-d H:i:s'),
            ]);
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
        return $this->builder('auth_tokens')->where(['user_id' => $id])->delete();
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
        $login = $this->builder('auth_logins')
            ->where('user_id', $id)->orderBy('logged_in_at', 'DESC')->limit(1);
        $login->update(['logged_out_at' => Carbon::now()->toDateTimeString()]);
    }

    /**
     * Purges the 'auth_tokens' table of any records that are past
     * their expiration date already.
     */
    public function purgeOldRememberTokens() {
        $config = config('Auth');

        if(!$config->allowRemembering) {
            return;
        }

        $this->db->table('auth_tokens')->where('expires <=', date('Y-m-d H:i:s'))->delete();
    }
}
