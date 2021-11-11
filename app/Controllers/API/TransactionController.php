<?php

namespace App\Controllers\API;

use App\Models\MpesaStkCallback;
use App\Models\PayPalCallback;
use App\Models\Transaction;
use App\Models\Wallet;
use Carbon\Carbon;
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
        $options = $this->request->getVar();

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
                    'status',
                    'created_at',
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
                    'status',
                    'created_at',
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
                    'status',
                    'created_at',
                ]),
            ];

            $transactions = collect($transactions)->map(function($transaction) use ($options) {
                if(isset($options['from_date'])) {
                    $fromDate = Carbon::createFromFormat('d-m-Y', $options['from_date'])->format('Y-m-d h:i:s');
                    $toDate = isset($options['to_date'])
                        ? Carbon::createFromFormat('d-m-Y', $options['to_date'])->format('Y-m-d h:i:s')
                        : now();
                    $transaction = $transaction->whereBetween('created_at', [$fromDate, $toDate]);
                }

                $transaction->prepend(count($transaction), 'count');

                return $transaction;
            });

            if(isset($options['pay_method'])) {
                $rules = [
                    'pay_method' => 'in_list[mpesa,paypal,wallet]'
                ];
                $messages = [
                    'pay_method' => ['email' => 'The email provided is already in use.']
                ];

                if(!$this->validate($rules, $messages)) {
                    return $this->failValidationErrors($this->validator->getErrors());
                }

                return $this->respond($transactions[$options['pay_method']]);
            }

            $transactions->prepend($transactions->sum('count'), 'total_transactions');

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
