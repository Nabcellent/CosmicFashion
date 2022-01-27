<?php

namespace App\Controllers;

use App\Models\User;
use Exception;

class UserController extends BaseController
{
    public function index(): string {
        $data = [
            'title' => "My Profile",
        ];

        return view('profile', $data);
    }

    public function account(): string {
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

    public function update() {
        $rules = [
//            'username' => 'alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]',
'username' => 'required|alpha_numeric_punct|min_length[3]|max_length[30]|is_unique[users.username,id,{id}]',
'email'    => 'required|valid_email|is_unique[users.email]',
        ];
    }

    public function loadWallet(): bool|string {
        try {
            $user = User::findOrFail(user_id());

            if($user->wallet()->exists()) {
                $wallet = $user->wallet;
                $wallet->amount += (float)$this->request->getVar('amount');
                $wallet->save();
            } else {
                $wallet = $user->wallet()->create($this->request->getVar());
            }

            return json_encode([
                'status'  => true,
                'message' => "Wallet loaded successful, new balance $wallet->amount",
                'balance' => $wallet->amount
            ]);
        } catch (Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return json_encode(['status' => false, 'message' => 'Unable to load wallet! Kindly contact admin.']);
        }
    }


    public function checkEmailExists(): string {
        $exists = User::where('email', $this->request->getVar('email'))->exists();

        return $exists
            ? "false"
            : "true";
    }
}
