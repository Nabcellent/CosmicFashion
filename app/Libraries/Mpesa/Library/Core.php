<?php

namespace App\Libraries\Mpesa\Library;

use Exception;
use GuzzleHttp\ClientInterface;

/**
 * Class Core
 *
 * @package DrH\Mpesa\Library
 */
class Core
{
    /**
     * @var ClientInterface
     */
    public ClientInterface $client;
    /**
     * @var Authenticator
     */
    public Authenticator $auth;

    /**
     * Core constructor.
     *
     * @param ClientInterface $client
     * @throws Exception
     */
    public function __construct(ClientInterface $client) {
        $this->client = $client;
        $this->auth = new Authenticator($this);
    }
}
