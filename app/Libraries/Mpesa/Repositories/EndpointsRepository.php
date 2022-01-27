<?php

namespace App\Libraries\Mpesa\Repositories;

use App\Libraries\Mpesa\Library\MpesaAccount;
use Exception;

/**
 * Class EndpointsRepository
 *
 * @package DrH\Mpesa\Repositories
 */
class EndpointsRepository
{

    /**
     * @param string            $section
     * @param MpesaAccount|null $account
     * @return string
     * @throws Exception
     */
    private static function getEndpoint(string $section, MpesaAccount $account = null): string {
        $list = [
            'auth'               => 'oauth/v1/generate?grant_type=client_credentials',
            'id_check'           => 'mpesa/checkidentity/v1/query',
            'register'           => 'mpesa/c2b/v1/registerurl',
            'stk_push'           => 'mpesa/stkpush/v1/processrequest',
            'stk_status'         => 'mpesa/stkpushquery/v1/query',
            'b2c'                => 'mpesa/b2c/v1/paymentrequest',
            'transaction_status' => 'mpesa/transactionstatus/v1/query',
            'account_balance'    => 'mpesa/accountbalance/v1/query',
            'b2b'                => 'mpesa/b2b/v1/paymentrequest',
            'simulate'           => 'mpesa/c2b/v1/simulate',
        ];

        if($item = $list[$section]) {
            return self::getUrl($item, $account);
        }

        throw new Exception('Unknown endpoint');
    }

    /**
     * @param string            $suffix
     * @param MpesaAccount|null $account
     * @return string
     */
    private static function getUrl(string $suffix, MpesaAccount $account = null): string {
        $baseEndpoint = 'https://api.safaricom.co.ke/';

        if(env('mpesa.sandbox') || ($account && $account->sandbox)) {
            $baseEndpoint = 'https://sandbox.safaricom.co.ke/';
        }

        return $baseEndpoint . $suffix;
    }

    /**
     * @param                   $endpoint
     * @param MpesaAccount|null $account
     * @return string
     * @throws Exception
     */
    public static function build($endpoint, MpesaAccount $account = null): string {
        return self::getEndpoint($endpoint, $account);
    }
}
