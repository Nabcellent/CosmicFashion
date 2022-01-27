<?php

namespace App\Libraries\Mpesa\Library;

use App\Libraries\Mpesa\Repositories\EndpointsRepository;
use App\Libraries\Mpesa\Repositories\Mpesa;
use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Str;
use Psr\Http\Message\ResponseInterface;
use function json_decode;

/**
 * Class ApiCore
 *
 * @package DrH\Mpesa\Library
 */
class ApiCore
{
    /**
     * @var Core
     */
    private Core $engine;
    /**
     * @var bool
     */
    public bool $bulk = false;
    /**
     * @var Mpesa
     */
    public Mpesa $mpesaRepository;

    /**
     * @var string
     */
    public string $bearer;

    /**
     * ApiCore constructor.
     *
     * @throws Exception
     */
    public function __construct() {
        $this->engine = new Core(new Client(['http_errors' => false,]));
        $this->mpesaRepository = new Mpesa();
    }

    /**
     * @param string $number
     * @param bool   $stripPlus
     * @return string
     */
    protected function formatPhoneNumber(string $number, bool $stripPlus = true): string {
        $number = preg_replace('/\s+/', '', $number);
        $replace = static function($needle, $replacement) use (&$number) {
            if(Str::startsWith($number, $needle)) {
                $pos = strpos($number, $needle);
                $length = strlen($needle);
                $number = substr_replace($number, $replacement, $pos, $length);
            }
        };
        $replace('2547', '+2547');
        $replace('07', '+2547');
        $replace('2541', '+2541');
        $replace('01', '+2541');
        if($stripPlus) {
            $replace('+254', '254');
        }
        return $number;
    }

    /**
     * @param array             $body
     * @param string            $endpoint
     * @param MpesaAccount|null $account
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function makeRequest(array $body, string $endpoint, MpesaAccount $account = null): ResponseInterface {
        if(env('mpesa.multi_tenancy', false)) {
            $this->bearer = $this->engine->auth->authenticate($this->bulk, $account);
        } else {
            $this->bearer = $this->engine->auth->authenticate($this->bulk);
        }

        return $this->engine->client->request('POST', $endpoint, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->bearer,
                'Content-Type'  => 'application/json',
            ],
            'json'    => $body,
        ]);
    }

    /**
     * @param array             $body
     * @param string            $endpoint
     * @param MpesaAccount|null $account
     * @return mixed
     * @throws GuzzleException
     * @throws Exception
     */
    public function sendRequest(array $body, string $endpoint, MpesaAccount $account = null): mixed {
        $endpoint = EndpointsRepository::build($endpoint, $account);

        try {
            $response = $this->makeRequest($body, $endpoint, $account);
            $_body = json_decode($response->getBody());

            if($response->getStatusCode() !== 200) {
                throw new Exception($_body->errorMessage
                    ? $_body->errorCode . ' - ' . $_body->errorMessage
                    : $response->getBody());
            }

            return $_body;
        } catch (ClientException $exception) {
            throw $this->generateException($exception);
        }
    }

    /**
     * @param ClientException $exception
     * @return Exception
     */
    private function generateException(ClientException $exception): Exception {
        return new Exception($exception->getResponse()->getBody());
    }
}
