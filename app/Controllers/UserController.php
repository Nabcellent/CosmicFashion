<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

class UserController extends BaseController
{
    public function index(): string
    {
        $data = [
            'title' => "My Profile",
        ];

        return view('profile', $data);
    }

    public function account(): string
    {
        $data = [
            'title' => "My Account",
            'user'  => User::with([
                'wallet',
                'orders' => function($query) {
                    $query->with([
                        'paymentType',
                        'ordersDetails' => function($query) {
                            $query->with('product');
                        }
                    ])->latest('id');
                }
            ])->find(user_id()),
        ];

        return view('account', $data);
    }

    public function loadWallet(): bool|string
    {
        try {
            $user = User::findOrFail(user_id());

            if($user->wallet()->exists()) {
                $wallet = $user->wallet;
                $wallet->balance += (float)$this->request->getVar('amount');
                $wallet->save();
            } else {
                $wallet = $user->wallet()->create($this->request->getVar());
            }

            return json_encode([
                'status'  => true,
                'message' => "Wallet loaded successful, new balance $wallet->balance",
                'balance' => $wallet->balance
            ]);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return json_encode(['status' => false, 'message' => 'Unable to load wallet! Kindly contact admin.']);
        }
    }


    public function checkEmailExists(): string
    {
        $exists = User::where('email', $this->request->getVar('email'))->exists();

        return $exists
            ? "false"
            : "true";
    }
}
