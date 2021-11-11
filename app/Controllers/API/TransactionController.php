<?php

namespace App\Controllers\API;

use App\Models\MpesaStkCallback;
use App\Models\PayPalCallback;
use App\Models\Transaction;
use App\Models\Wallet;
use CodeIgniter\RESTful\ResourceController;
use Config\Services;
use Exception;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class TransactionController extends ResourceController
{
    protected $format = 'json';

    public function __construct() { Services::eloquent(); }

    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index(): mixed {
        try {
            $transactions = [
                'wallet' => Transaction::with([
                    'payable' => function(MorphTo $morphTo) {
                        $morphTo->morphWith([Wallet::class])->select(['id', 'amount']);
                    }
                ])->whereHasMorph('payable', [Wallet::class])->get([
                    'order_id',
                    'payable_id',
                    'payable_type',
                    'type',
                    'id',
                    'status'
                ]),
                'paypal' => Transaction::with([
                    'payable' => function(MorphTo $morphTo) {
                        $morphTo->morphWith([PayPalCallback::class])->select(['id', 'order_id', 'amount']);
                    }
                ])->whereHasMorph('payable', [PayPalCallback::class])->get([
                    'payable_id',
                    'payable_type',
                    'type',
                    'id',
                    'status'
                ]),
                'mpesa'  => Transaction::with([
                    'payable' => function(MorphTo $morphTo) {
                        $morphTo->morphWith([
                            MpesaStkCallback::class => [
                                'request' => function($query) {
                                    $query->select(['id', 'checkout_request_id', 'user_id', 'order_id', 'phone']);
                                }
                            ]
                        ])->select(['id', 'checkout_request_id', 'result_code', 'amount', 'transaction_date']);
                    }
                ])->whereHasMorph('payable', [MpesaStkCallback::class])->get([
                    'payable_id',
                    'payable_type',
                    'type',
                    'id',
                    'status'
                ]),
            ];

            $transactions['mpesa']->prepend(count($transactions['mpesa']), 'count');

            return $this->respond($transactions);
        } catch (Exception $e) {
            return $this->failServerError($e->getMessage());
        }
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null) {
        //
    }
}
