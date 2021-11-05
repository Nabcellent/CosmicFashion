<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Libraries\Mpesa\Repositories\Mpesa;
use App\Libraries\Mpesa\Static\STK;
use App\Models\MpesaStkRequest;
use App\Models\Order;
use CodeIgniter\HTTP\RedirectResponse;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;

class PaymentController extends BaseController
{
    public function initiateStkPush(): bool|string {
        $phone = $this->request->getVar('phone');

        $phone = "254" . (Str::length($phone) > 9
                ? Str::substr($phone, -9)
                : $phone);

        try {
            $stkRequest = mpesa_request($phone, 1, 'CosmicFashion.', 'Payment made to CosmicFashion.');

            if($order = \App\Controllers\OrderController::storeCart(['payment_type_id' => $this->request->getVar('payment_method')])) {
                $stkRequest->order_id = $order->id;
                $stkRequest->save();
            }

            return json_encode(['status' => true, 'requestId' => $stkRequest->checkout_request_id]);
        } catch (Exception | GuzzleException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);

            return json_encode([
                'status' => false,
                'msg'    => 'unable to complete payment.'
            ]);
        }
    }

    public function queryStatus(): RedirectResponse {
        try {
            (new Mpesa())->queryStkStatus();

            return updateOk('Missing Requests have been queried successfully...');
        } catch(Exception $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);
            return toastError($e->getMessage(), 'Unable to query status💔');
        }
    }

    /**
     * @param $reference
     * @return false|string
     */
    public function stkStatus($reference) {
        try {
            $stkStatus = STK::validate($reference);
            $url = "";

            if(property_exists($stkStatus, 'errorCode')) {
                $status = 'processing';
                $message = $stkStatus->errorMessage | 'Waiting for customer response...';
            } else {
                $status = 'processed';
                $resultCode = (int)$stkStatus->ResultCode;

                if($resultCode === 0) {
                    $message = 'Payment Successful!';
                    $icon = 'success';
                    $url = route_to('orders.thanks');

                    try {
                        $order = MpesaStkRequest::where('checkout_request_id', $reference)->first()->order;
                        $order->is_paid = true;
                        $order->save();
                    } catch (Exception $e) {
                        log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);

                        $message = 'Something went wrong. Kindly contact the Admin';
                        $icon = 'warning';
                    }
                } else if($resultCode === 1032) {
                    $message = 'Payment Cancelled';
                    $icon = 'info';
                } else if($resultCode === 1) {
                    $message = 'Your M-PESA balance is insufficient.';
                    $icon = 'info';
                } else {
                    $message = 'Something did not go right somewhere.';
                    $icon = 'warning';
                }

                (new Mpesa())->queryStkStatus();

                return json_encode(['status' => $status, 'message' => $message, 'icon' => $icon, 'url' => $url]);
            }
        } catch (Exception | GuzzleException $e) {
            log_message('error', '[ERROR] {exception}', ['exception' => $e->getMessage()]);

            return json_encode([
                'status'  => 'failed',
                'message' => 'Unable to complete transaction. please contact the admin.'
            ]);
        }

        return json_encode(['status' => $status, 'message' => $message]);
    }
}
