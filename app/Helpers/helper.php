<?php

use CodeIgniter\HTTP\RedirectResponse;

if(!function_exists('isRed')) {
    function isRed(): bool {
        return (int)user()->role_id === 1;
    }
}

if(!function_exists('isAdmin')) {
    function isAdmin(): bool {
        helper('auth');
        return in_array((int)user()->role_id, [1, 2]);;
    }
}