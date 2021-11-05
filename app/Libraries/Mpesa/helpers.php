<?php

use App\Libraries\Mpesa\Library\MpesaAccount;
use App\Libraries\Mpesa\Static\STK;
use App\Models\MpesaStkRequest;
use GuzzleHttp\Exception\GuzzleException;

if(!function_exists('mpesa_request')) {
    /**
     * @param string            $phone
     * @param int               $amount
     * @param null              $reference
     * @param null              $description
     * @param MpesaAccount|null $account
     * @return MpesaStkRequest
     * @throws GuzzleException
     */
    function mpesa_request(string $phone, int $amount, $reference = null, $description = null, MpesaAccount $account = null): MpesaStkRequest {
        return STK::push($amount, $phone, $reference, $description, $account);
    }
}
if(!function_exists('mpesa_validate')) {
    /**
     * @param $checkoutRequestId
     * @return mixed
     * @throws GuzzleException
     */
    function mpesa_validate($checkoutRequestId): mixed {
        return STK::validate($checkoutRequestId);
    }
}
if(!function_exists('mpesa_stk_status')) {
    /**
     * @param $checkoutRequestId
     * @return mixed
     * @throws GuzzleException
     */
    function mpesa_stk_status($checkoutRequestId): mixed {
        return STK::validate($checkoutRequestId);
    }
}