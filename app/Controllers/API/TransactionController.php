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
use Illuminate\Support\Arr;

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
            $transactionFields = [
                'payable_id',
                'payable_type',
                'type',
                'id',
                'status',
                'created_at',
            ];

            $transactions = [
                'wallet' => Transaction::with([
                    'payable' => function(MorphTo $morphTo) {
                        $morphTo->morphWith([Wallet::class])->select(['id', 'amount']);
                    }
                ])->whereHasMorph('payable', [Wallet::class])->whereHas('order', function($query) use ($options) {
                    return self::filterCategories($query, $options);
                })->get([
                    'order_id',
                    ...$transactionFields
                ]),
                'paypal' => Transaction::with([
                    'payable' => function(MorphTo $morphTo) {
                        $morphTo->morphWith([PayPalCallback::class])->select(['id', 'order_id', 'amount']);
                    }
                ])->whereHasMorph('payable', [PayPalCallback::class], function($query) use ($options) {
                    $query->whereHas('order', function($query) use ($options) {
                        return $this->filterCategories($query, $options);
                    });
                })->get($transactionFields),
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
                ])->whereHasMorph('payable', [MpesaStkCallback::class], function($query) use ($options) {
                    $query->whereHas('request', function($query) use ($options) {
                        $query->whereHas('order', function($query) use ($options) {
                            return $this->filterCategories($query, $options);
                        });
                    });
                })->get($transactionFields),
            ];

            $transactions = collect($transactions)->map(function($transaction, $key) use ($options) {
                if(isset($options['from_date'])) {
                    $fromDate = Carbon::createFromFormat('d-m-Y', $options['from_date'])->format('Y-m-d h:i:s');
                    $toDate = isset($options['to_date'])
                        ? Carbon::createFromFormat('d-m-Y', $options['to_date'])->format('Y-m-d h:i:s')
                        : now();
                    $transaction = $transaction->whereBetween('created_at', [$fromDate, $toDate]);
                }

                $count = count($transaction);
                $transaction->prepend($count, 'count');

                if(!$count) $transaction['message'] = 'No transaction found matching your query.';

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
     * @param $query
     * @param $options
     * @return mixed
     */
    public static function filterCategories($query, $options): mixed {
        return $query->whereHas('ordersDetails', function($query) use ($options) {
            $query->whereHas('product', function($query) use ($options) {
                if(Arr::hasAny($options, ['sub_category', 'category'])) {
                    $query->whereHas('subCategory', function($query) use ($options) {
                        if(Arr::has($options, 'category')) {
                            $query->whereHas('category', function($query) use ($options) {
                                return $query->whereName($options['category']);
                            });
                        }

                        if(Arr::has($options, 'sub_category')) {
                            return $query->whereName($options['sub_category']);
                        }
                    });
                }

                if(Arr::has($options, 'product')) {
                    return $query->whereName($options['product']);
                }
            });
        });
    }
}
