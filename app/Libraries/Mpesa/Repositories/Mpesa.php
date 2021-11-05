<?php

namespace App\Libraries\Mpesa\Repositories;

use App\Models\MpesaStkCallback;
use App\Models\MpesaStkRequest;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Mpesa
 *
 * @package DrH\Repositories
 */
class Mpesa
{
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
        ];

        if($data->ResultCode == 0) {
            $_payload = $data->CallbackMetadata->Item;
            foreach($_payload as $callback) {
                $real_data[$callback->Name] = @$callback->Value;
            }
        }

        $callback = MpesaStkCallback::create($real_data);
        $this->updateStkRequest($callback);

        return $callback;
    }

    /**
     * @return array
     */
    public function queryStkStatus(): array {
        /** @var MpesaStkRequest[] $stk */
        $stk = MpesaStkRequest::whereDoesntHave('response')->get();
        $success = $errors = [];

        foreach($stk as $item) {
            try {
                $status = mpesa_stk_status($item->id);
                if(isset($status->errorMessage)) {
                    $errors[$item->CheckoutRequestID] = $status->errorMessage;
                    continue;
                }

                $attributes = [
                    'merchant_request_id' => $status->MerchantRequestID,
                    'checkout_request_id' => $status->CheckoutRequestID,
                    'result_code'         => $status->ResultCode,
                    'result_desc'         => $status->ResultDesc,
                    'amount'              => $item->amount,
                ];

                $success[$item->CheckoutRequestID] = $status->ResultDesc;

                $callback = MpesaStkCallback::create($attributes);

                $this->updateStkRequest($callback, get_object_vars($status));
            } catch (Exception|GuzzleException $e) {
                $errors[$item->CheckoutRequestID] = $e->getMessage();
            }
        }

        return ['successful' => $success, 'errors' => $errors];
    }

    /**
     * @param MpesaStkCallback $stkCallback
     * @return void
     */
    private function updateStkRequest(MpesaStkCallback $stkCallback): void {
        if($stkCallback->result_code == 0) {
            $stkCallback->request()->update(['status' => 'Paid']);
        } else {
            $stkCallback->request()->update(['status' => 'Failed']);
        }
    }
}
