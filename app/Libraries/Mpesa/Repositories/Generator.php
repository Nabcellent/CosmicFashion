<?php

namespace App\Libraries\Mpesa\Repositories;

use Exception;
use function random_int;
use function strlen;

/**
 * Class Generator
 *
 * @package DrH\Repositories
 */
class Generator
{
    /**
     * Generate a random transaction number
     *
     * @return string
     * @throws Exception
     */
    public static function generateTransactionNumber(): string {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';

        for($i = 0; $i < 15; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }

        return $randomString;
    }

    /**
     * @param string $initiatorPass
     * @return string
     * @throws Exception
     */
    public static function computeSecurityCredential(string $initiatorPass): string {
        $pubKeyFile = env('mpesa.sandbox')
            ? __DIR__ . '/../Support/sandbox.cer'
            : __DIR__ . '/../Support/production.cer';

        if(is_file($pubKeyFile)) {
            $pubKey = file_get_contents($pubKeyFile);
        } else {
            throw new Exception('Please provide a valid public key file');
        }

        openssl_public_encrypt($initiatorPass, $encrypted, $pubKey, OPENSSL_PKCS1_PADDING);

        return base64_encode($encrypted);
    }
}
