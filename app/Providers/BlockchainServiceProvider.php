<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
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

        // Generate and set the hospital admin master key
        if (empty(Storage::get('keys/hospital_admin_master_key.pem'))) {
            $masterKeyPair = $this->generateMasterKeyPair();

            // Store Master Key
            Storage::put('keys/hospital_admin_master_key.pem', $masterKeyPair['privateKey']);
            Storage::put('keys/hospital_admin_master_public_key.pem', $masterKeyPair['publicKey']);

            // Configure Config
            Config::set('blockchain.hospital_admin_master_key', $masterKeyPair['privateKey']);
            Config::set('blockchain.hospital_admin_master_public_key', $masterKeyPair['publicKey']);
        } else {
            Config::set('blockchain.hospital_admin_master_key', Storage::get('keys/hospital_admin_master_key.pem'));
            Config::set('blockchain.hospital_admin_master_public_key', Storage::get('keys/hospital_admin_master_public_key.pem'));
        }

        // Generate User KeyPiar
        Event::listen(Login::class, function ($event) {
            $user = $event->user;
            $masterPrivateKey = Config::get('blockchain.hospital_admin_master_key');
            $masterPublicKey = Config::get('blockchain.hospital_admin_master_public_key');

            $this->generateAndStoreKeyPair($masterPrivateKey, $masterPublicKey, $user);
        });

        Event::listen(Registered::class, function ($event) {
            $user = $event->user;
            $masterPrivateKey = Config::get('blockchain.hospital_admin_master_key');
            $masterPublicKey = Config::get('blockchain.hospital_admin_master_public_key');
            $this->generateAndStoreKeyPair($masterPrivateKey, $masterPublicKey, $user);
        });
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
     * Generate a master key pair.
     *
     * @return array
     */
    public function generateMasterKeyPair()
    {
        $config = [
            'config' => env('OPENSSL_CONFIG_PATH'),
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        $keyPair = openssl_pkey_new($config);

        openssl_pkey_export($keyPair, $privateKey, null, $config);
        $privateKey = str_replace(["-----BEGIN PRIVATE KEY-----", "-----END PRIVATE KEY-----", "\n", "\r"], "", $privateKey);

        $publicKey = openssl_pkey_get_details($keyPair)['key'];
        $publicKey = str_replace(["-----BEGIN PUBLIC KEY-----", "-----END PUBLIC KEY-----", "\n", "\r"], "", $publicKey);

        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
        ];
    }

    /**
     * Generate a public/private key pair.
     *
     * @return array
     */
    private function generateUserKeyPair($masterPrivateKey, $masterPublicKey, $userType)
    {
        $config = [
            'config' => env('OPENSSL_CONFIG_PATH'),
            "private_key_bits" => 2048,
            "private_key_type" => OPENSSL_KEYTYPE_RSA,
        ];

        $keyPair = openssl_pkey_new($config);

        openssl_pkey_export($keyPair, $privateKey, null, $config);
        $privateKey = str_replace(["-----BEGIN PRIVATE KEY-----", "-----END PRIVATE KEY-----", "\n", "\r"], "", $privateKey);

        $publicKey = str_replace(["-----BEGIN PUBLIC KEY-----", "-----END PUBLIC KEY-----", "\n", "\r"], "", openssl_pkey_get_details($keyPair)['key']);

        // Format master private key
        $masterPrivateKey = "-----BEGIN PRIVATE KEY-----\n" . wordwrap($masterPrivateKey, 64, "\n", true) . "\n-----END PRIVATE KEY-----";

        // Sign the user's public key with the master private key to create a user identifier
        $signature = '';
        openssl_sign($publicKey, $signature, $masterPrivateKey, OPENSSL_ALGO_SHA256);
        $userIdentifier = base64_encode($signature);

        return [
            'privateKey' => $privateKey,
            'publicKey' => $publicKey,
            'userIdentifier' => $userIdentifier,
            'userType' => $userType,
        ];
    }

    /**
     * Generate and store public/private key pair for a user.
     *
     * @param string $masterPrivateKey Master private key
     * @param string $masterPublicKey Master public key
     * @param User $user
     */
    private function generateAndStoreKeyPair($masterPrivateKey, $masterPublicKey, $user)
    {
        if (!$user->uuid) {
            $uuid = Str::uuid();
            $privateKeyPath = "keys/{$uuid}/{$user->role}_private_key.pem";
            $publicKeyPath = "keys/{$uuid}/{$user->role}_public_key.pem";

            $user->update(['uuid' => $uuid]);
        } else {
            $privateKeyPath = "keys/{$user->uuid}/{$user->role}_private_key.pem";
            $publicKeyPath = "keys/{$user->uuid}/{$user->role}_public_key.pem";
        }

        if (!Storage::exists($privateKeyPath) || !Storage::exists($publicKeyPath)) {
            $keyPair = $this->generateUserKeyPair($masterPrivateKey, $masterPublicKey, $user->role);

            Storage::put($privateKeyPath, $keyPair['privateKey']);
            Storage::put($publicKeyPath, $keyPair['publicKey']);
        }

        // Set in configuration files
        Config::set('blockchain.private_key', Storage::get($privateKeyPath));
        Config::set('blockchain.public_key', Storage::get($publicKeyPath));

        Session::put('public_key', Storage::get($publicKeyPath));
        Session::put('private_key', Storage::get($privateKeyPath));
    }
}
