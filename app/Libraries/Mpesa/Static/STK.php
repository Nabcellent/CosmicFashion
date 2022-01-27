<?php

namespace App\Libraries\Mpesa\Static;

use App\Libraries\Mpesa\Library\StkPush;
use App\Models\MpesaStkRequest;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class STK
 *
 * @package DrH\Mpesa\Facades
 */
class STK
{
    /**
     * @param $amount
     * @param $phone
     * @param $reference
     * @param $description
     * @param $account
     * @return MpesaStkRequest
     * @throws GuzzleException
     */
    public static function push($amount, $phone, $reference, $description, $account): MpesaStkRequest {
        return (new StkPush())->push($amount, $phone, $reference, $description, $account);
    }


    /**
     * @throws GuzzleException
     */
    public static function validate($checkoutRequestId) {
        return (new StkPush())->validate($checkoutRequestId);
    }
}
