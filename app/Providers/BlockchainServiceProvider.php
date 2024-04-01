<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
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
        if (empty(Storage::get('keys/symmetric_key.txt'))) {
            $symmetricKey = $this->generateSymmetricKey();
            Storage::put('keys/symmetric_key.txt', $symmetricKey);
            Config::set('blockchain.symmetric_key', $symmetricKey);
        } else {
            Config::set('blockchain.symmetric_key', Storage::get('keys/symmetric_key.txt'));
        }

        // Generate and set the public/private key pair
        $keyPair = $this->generateKeyPair();
        Config::set('blockchain.private_key', $keyPair['privateKey']);
        Config::set('blockchain.public_key', $keyPair['publicKey']);
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
        $privateKeyPath = 'keys/private_key.pem';
        $publicKeyPath = 'keys/public_key.pem';

        if (Storage::exists($privateKeyPath) && Storage::exists($publicKeyPath)) {
            return [
                'privateKey' => Storage::get($privateKeyPath),
                'publicKey' => Storage::get($publicKeyPath),
            ];
        }

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

        Storage::put($privateKeyPath, $privateKey);
        Storage::put($publicKeyPath, $publicKey);

        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];
    }
}
