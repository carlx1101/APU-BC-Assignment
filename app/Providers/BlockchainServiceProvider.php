<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class BlockchainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Generate and set the symmetric key
        if (empty(env('BLOCKCHAIN_SYMMETRIC_KEY'))) {
            Config::set('blockchain.symmetric_key', $this->generateSymmetricKey());
        }

        // Generate and set the public/private key pair
        if (empty(env('BLOCKCHAIN_PRIVATE_KEY')) || empty(env('BLOCKCHAIN_PUBLIC_KEY'))) {
            $keyPair = $this->generateKeyPair();
            Config::set('blockchain.private_key', $keyPair['privateKey']);
            Config::set('blockchain.public_key', $keyPair['publicKey']);
        }
    }

    /**
     * Generate a symmetric key.
     *
     * @return string
     */
    private function generateSymmetricKey()
    {
        return base64_encode(random_bytes(32));
    }

    /**
     * Generate a public/private key pair.
     *
     * @return array
     */
    private function generateKeyPair()
    {
        $config = [
            'config' => env('OPENSSL_CONFIG_PATH'),
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];
        // Generate the private and public key
        $keyPair = openssl_pkey_new($config);

        // Extract the private key
        openssl_pkey_export($keyPair, $privateKey, null, $config);
        $privateKey = str_replace(["-----BEGIN PRIVATE KEY-----", "-----END PRIVATE KEY-----", "\n", "\r"], "", $privateKey);

        // Extract the public key
        $publicKey = openssl_pkey_get_details($keyPair)['key'];
        $publicKey = str_replace(["-----BEGIN PUBLIC KEY-----", "-----END PUBLIC KEY-----", "\n", "\r"], "", $publicKey);


        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];
    }
}
