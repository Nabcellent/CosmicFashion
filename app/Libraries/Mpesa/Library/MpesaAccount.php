<?php


namespace App\Libraries\Mpesa\Library;

/**
 * Class MpesaAccount
 *
 * @package DrH\Mpesa\Library
 */
class MpesaAccount
{
    /**
     * MpesaAccount constructor.
     *
     * @param bool   $sandbox
     * @param string $type
     * @param string $shortcode
     * @param string $key
     * @param string $secret
     * @param string $passkey
     *
     */
    public function __construct(public string $shortcode, public string $key, public string $secret, public string $passkey, public bool $sandbox = false, public string $type = 'PAYBILL',) {
    }
}
