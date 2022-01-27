<?php

namespace App\Libraries\Mpesa\Library;

use App\Libraries\Mpesa\Repositories\EndpointsRepository;
use Exception;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;
use Psr\Http\Message\ResponseInterface;
use function base64_encode;
use function json_decode;
use function strtolower;

/**
 * Class Authenticator
 *
 * @package DrH\Mpesa\Library
 */
class Authenticator
{

    /**
     * @var string
     */
    protected string $endpoint;
    /**
     * @var Core
     */
    protected Core $engine;
    /**
     * @var Authenticator
     */
    protected static Authenticator $instance;
    /**
     * @var bool
     */
    public bool $alt = false;
    /**
     * @var string
     */
    private string $credentials;

    /**
     * Authenticator constructor.
     *
     * @param Core $core
     * @throws Exception
     */
    public function __construct(Core $core) {
        $this->engine = $core;
        $this->endpoint = EndpointsRepository::build('auth');

        self::$instance = $this;
    }

    /**
     * @param bool              $bulk
     * @param MpesaAccount|null $account
     * @return string|null
     * @throws GuzzleException|Exception
     */
    public function authenticate(bool $bulk, MpesaAccount $account = null): ?string {
        if($bulk) $this->alt = true;

        $this->generateCredentials($account);
        if(env('mpesa.cache_credentials', false) && !empty($key = $this->getFromCache())) {
            return $key;
        }

        try {
            $response = $this->makeRequest();

            if($response->getStatusCode() === 200) {
                $body = json_decode($response->getBody());
//                $this->saveCredentials($body);

                return $body->access_token;
            }

            throw new Exception($response->getReasonPhrase());
        } catch (RequestException $exception) {
            $message = $exception->getResponse()
                ? $exception->getResponse()->getReasonPhrase()
                : $exception->getMessage();

            throw $this->generateException($message);
        }
    }

    /**
     * @param $reason
     * @return Exception|null
     */
    private function generateException($reason): ?Exception {
        return match (strtolower($reason)) {
            'Bad Request: Invalid Credentials' => new Exception('Invalid consumer key and secret combination'),
            default => new Exception($reason),
        };
    }

    /**
     * @throws Exception
     */
    private function generateCredentials(MpesaAccount $account = null): self {
        if(env('mpesa.multi_tenancy', false) && ($account && !$account->sandbox)) {
            if($account->key == null || $account->secret == null) {
                throw $this->generateException("Multi Tenancy is enabled but key or secret is null.");
            }

            $key = $account->key;
            $secret = $account->secret;
        } else {
            $key = env('mpesa.key');
            $secret = env('mpesa.secret');

            if($this->alt) {
                //lazy way to switch to a different app in case of bulk
                $key = env('mpesa.b2c.consumer_key');
                $secret = env('mpesa.b2c.consumer_secret');
            }
        }

        $this->credentials = base64_encode($key . ':' . $secret);

        return $this;
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    private function makeRequest(): ResponseInterface {
        return $this->engine->client->request('GET', $this->endpoint, [
            'headers' => [
                'Authorization' => 'Basic ' . $this->credentials,
                'Content-Type'  => 'application/json',
            ],
        ]);
    }

    /**
     * @return mixed
     */
    private function getFromCache(): mixed {
        return Cache::get($this->credentials);
    }

    /**
     * Store the credentials in the cache.
     *
     * @param $credentials
     */
    private function saveCredentials($credentials) {
        Cache::put($this->credentials, $credentials->access_token, 30);
    }
}
