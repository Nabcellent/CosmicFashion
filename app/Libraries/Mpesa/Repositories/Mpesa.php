<?php

namespace App\Libraries\Mpesa\Repositories;

use App\Models\MpesaStkCallback;
use App\Models\MpesaStkRequest;
use CodeIgniter\Config\Services;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;
use JetBrains\PhpStorm\ArrayShape;

/**
 * Class Mpesa
 *
 * @package DrH\Repositories
 */
class Mpesa
{
    public function __construct() {
        Services::eloquent();
    }

    /**
     * @param string $json
     * @return $this|array|Model
     */
    public function processStkPushCallback(string $json): Model|array|static {
        $object = json_decode($json);
        $data = $object->stkCallback;

        $real_data = [
            'merchant_request_id' => $data->MerchantRequestID,
            'checkout_request_id' => $data->CheckoutRequestID,
            'result_code'         => $data->ResultCode,
            'result_desc'         => $data->ResultDesc,
            'type'                => 'payment',
        ];

        if($data->ResultCode == 0) {
            $_payload = $data->CallbackMetadata->Item;
            foreach($_payload as $callback) {
                $real_data[$callback->Name] = @$callback->Value;
            }
        }

        $callback = MpesaStkCallback::create($real_data);
        $this->updateStkRequest($callback, $real_data);

        return $callback;
    }

    /**
     * @return array
     */
    #[ArrayShape(['successful' => "array", 'errors' => "array"])]
    public function queryStkStatus(): array {
        /** @var MpesaStkRequest[] $stk */
        $stk = MpesaStkRequest::whereDoesntHave('response')->get();
        $success = $errors = [];

        foreach($stk as $item) {
            try {
                $status = mpesa_stk_status($item->checkout_request_id);

                if(isset($status->errorMessage)) {
                    $errors[$item->checkout_request_id] = $status->errorMessage;
                    continue;
                }

                $attributes = [
                    'merchant_request_id' => $status->MerchantRequestID,
                    'checkout_request_id' => $status->CheckoutRequestID,
                    'result_code'         => $status->ResultCode,
                    'result_desc'         => $status->ResultDesc,
                    'amount'              => $item->amount,
                    'transaction_date'    => $item->created_at,
                    'type'                => 'payment',
                ];

                $success[$status->CheckoutRequestID] = $status->ResultDesc;

                $callback = MpesaStkCallback::create($attributes);

                $this->updateStkRequest($callback, $attributes);
            } catch (Exception | GuzzleException $e) {
                $errors[$item->checkout_request_id] = $e->getMessage();
            }
        }

        return ['successful' => $success, 'errors' => $errors];
    }

    /**
     * @param MpesaStkCallback $stkCallback
     * @param                  $attributes
     * @return void
     */
    private function updateStkRequest(MpesaStkCallback $stkCallback, $attributes): void {
        if($stkCallback->result_code == 0) {
            $status = 'paid';
        } else {
            $status = 'failed';
        }
        $attributes['status'] = $status;

        $stkCallback->request()->update(['status' => $status]);
        $stkCallback->transaction()->create($attributes);
    }
}
