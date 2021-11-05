<?php

namespace App\Libraries\Mpesa\Library;

use App\Libraries\Mpesa\Repositories\Generator;
use App\Models\MpesaStkRequest;
use Carbon\Carbon;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Database\Eloquent\Model;
use function base64_encode;
use function count;
use function is_numeric;
use function preg_match;

/**
 * Class StkPush
 *
 * @package DrH\Mpesa\Library
 */
class StkPush extends ApiCore
{
    /**
     * @var string
     */
    protected $number;
    /**
     * @var int
     */
    protected $amount;
    /**
     * @var string
     */
    protected $reference;
    /**
     * @var string
     */
    protected $description;

    /**
     * @param string $amount
     * @return $this
     * @throws Exception
     * @throws Exception
     */
    public function request(string $amount): self {
        if(!is_numeric($amount)) {
            throw new Exception('The amount must be numeric, got ' . $amount);
        }
        $this->amount = $amount;
        return $this;
    }

    /**
     * @param string $number
     * @return $this
     */
    public function from(string $number): self {
        $this->number = $this->formatPhoneNumber($number);
        return $this;
    }

    /**
     * Set the mpesa reference
     *
     * @param string $reference
     * @param string $description
     * @return $this
     * @throws Exception
     * @throws Exception
     */
    public function usingReference(string $reference, string $description): self {
        preg_match('/[^A-Za-z0-9]/', $reference, $matches);
        if(count($matches)) {
            throw new Exception('Reference should be alphanumeric.');
        }
        $this->reference = $reference;
        $this->description = $description;
        return $this;
    }

    /**
     * Send a payment request
     *
     * @param int|null          $amount
     * @param string|null       $number
     * @param string|null       $reference
     * @param string|null       $description
     * @param MpesaAccount|null $account
     * @return MpesaStkRequest
     * @throws Exception
     * @throws GuzzleException
     * @throws Exception
     */
    public function push(int $amount = null, string $number = null, string $reference = null, string $description = null, MpesaAccount $account = null): MpesaStkRequest {
        $time = Carbon::now()->format('YmdHis');

        if(env('mpesa.multi_tenancy', false) && ($account && !$account->sandbox)) {
            if($account == null || $account->passkey == null || $account->shortcode == null) {
                throw new Exception("Multi Tenancy is enabled but Mpesa Account is null.");
            }

            $shortCode = $account->shortcode;
            $passkey = $account->passkey;
        } else {
            $shortCode = env('mpesa.c2b.short_code');
            $passkey = env('mpesa.c2b.passkey');
        }

        $callback = 'https://cosmicfashion.nosterlab.com/' . env('mpesa.c2b.stk_callback');
        $password = base64_encode($shortCode . $passkey . $time);
        $good_phone = $this->formatPhoneNumber($number
            ? : $this->number);

        $body = [
            'BusinessShortCode' => $shortCode,
            'Password'          => $password,
            'Timestamp'         => $time,
            'TransactionType'   => 'CustomerPayBillOnline',
            'Amount'            => $amount
                ? : $this->amount,
            'PartyA'            => $good_phone,
            'PartyB'            => $shortCode,
            'PhoneNumber'       => $good_phone,
            'CallBackURL'       => $callback,
            'AccountReference'  => $reference ?? $this->reference ?? $good_phone,
            'TransactionDesc'   => $description ?? $this->description ?? Generator::generateTransactionNumber(),
        ];
        
        if(env('mpesa.multi_tenancy', false)) {
            $response = $this->sendRequest($body, 'stk_push', $account);
        } else {
            $response = $this->sendRequest($body, 'stk_push');
        }

        return $this->saveStkRequest($body, (array)$response);
    }

    /**
     * @param array $body
     * @param array $response
     * @return MpesaStkRequest|Model
     * @throws Exception
     * @throws Exception
     */
    private function saveStkRequest(array $body, array $response): Model|MpesaStkRequest {
        if($response['ResponseCode'] == 0) {
            $incoming = [
                'phone'               => $body['PartyA'],
                'amount'              => $body['Amount'],
                'reference'           => $body['AccountReference'],
                'description'         => $body['TransactionDesc'],
                'checkout_request_id' => $response['CheckoutRequestID'],
                'merchant_request_id' => $response['MerchantRequestID'],
                'user_id'             => user_id() ?? null,
            ];

            return MpesaStkRequest::create($incoming);
        }

        throw new Exception($response['ResponseDescription']);
    }


    /**
     * Validate an initialized transaction.
     *
     * @param int|string $checkoutRequestID
     *
     * @return mixed
     * @throws Exception
     * @throws GuzzleException
     */
    public function validate(string|int $checkoutRequestID): mixed {
        if((int)$checkoutRequestID) {
            $checkoutRequestID = MpesaStkRequest::find($checkoutRequestID)->checkout_request_id;
        }

        $time = Carbon::now()->format('YmdHis');

        $shortCode = env('mpesa.c2b.short_code');
        $passkey = env('mpesa.c2b.passkey');
        $password = base64_encode($shortCode . $passkey . $time);

        $body = [
            'BusinessShortCode' => $shortCode,
            'Password'          => $password,
            'Timestamp'         => $time,
            'CheckoutRequestID' => $checkoutRequestID,
        ];

        try {
            return $this->sendRequest($body, 'stk_status');
        } catch (RequestException $exception) {
            throw new Exception($exception->getMessage());
        }
    }
}
