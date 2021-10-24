<?php

use CodeIgniter\HTTP\RedirectResponse;
use Illuminate\Support\Carbon;

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

if(!function_exists('differenceForHumans')) {
    function differenceForHumans($date): string {
        return Carbon::parse($date)->diffForHumans();
    }
}