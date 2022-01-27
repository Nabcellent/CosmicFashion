<?php namespace App\Models;

use CodeIgniter\Model;
use DateTime;

class LoginModel extends Model
{
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
}
