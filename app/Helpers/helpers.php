<?php

use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

if(!function_exists('cartDetails')) {
    function cartDetails(string $detail = null) {
        $cart = [
            'count' => sizeof(session('cart') ?? []),
            'total' => collect(session('cart'))->sum('sub_total')
        ];

        return $detail ? $cart[$detail] : $cart;
    }
}

if(!function_exists('emptyCart')) {
    function emptyCart() {
        session()->set('cart', []);

        $dbCart = Cart::where('user_id', user_id());
        if(logged_in() && $dbCart->exists()) {
            $dbCart->delete();
        }
    }
}

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

if(!function_exists('form_method')) {
    function form_method($method = 'POST'): string {
        return '<input type="hidden" name="_method" value="' . $method . '" />';
    }
}

if(!function_exists('getModel')) {
    function getModel($model): string {
        $table = Str::snake(Str::plural($model));

        return match ($table) {
            'users' => User::class,
            'categories' => Category::class,
            'sub_categories' => SubCategory::class,
            'products' => Product::class,
        };
    }
}



/**
 *  ===========================================================================    LARAVEL HELPERS
 */
if (! function_exists('collect')) {
    /**
     * Create a collection from the given value.
     *
     * @param mixed|null $value
     * @return Collection
     */
    function collect(mixed $value = null): Collection {
        return new Collection($value);
    }
}
if(!function_exists('now')) {
    /**
     * @return Carbon
     */
    function now(): Carbon {
        return Carbon::now();
    }
}
