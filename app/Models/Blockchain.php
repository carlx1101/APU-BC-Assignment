<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blockchain extends Model
{
    use HasFactory;

    protected $table = 'blockchains';

    protected $fillable = [
        'index',
        'timestamp',
        'current_hash',
        'prev_hash',
        'transactions'
    ];


    /**
     * Verify Signature.
     */
    public static function verifySignature($data, $signature, $publicKey)
    {
        return openssl_verify($data, base64_decode($signature), $publicKey, OPENSSL_ALGO_SHA256) === 1;
    }


    /**
     * Hashing block using SHA-256.
     */
    public static function hashBlock($block)
    {
        $block_string = json_encode([
            'index' => $block['index'],
            'timestamp' => $block['timestamp'],
            'prev_hash' => $block['prev_hash'],
            'transactions' => $block['transactions']
        ], JSON_UNESCAPED_UNICODE);

        return hash('sha256', $block_string);
    }

    /**
     * Encrypt data in block.
     */
    public static function encryptData($data, $key)
    {
        $data = json_encode($data); // Change to json string
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        $salt = openssl_random_pseudo_bytes(16); // Generate a random salt
        $encrypted = openssl_encrypt($data, 'aes-256-cbc', $key, 0, $iv);
        return base64_encode($encrypted . '::' . $salt . '::' . $iv); // Store salt along with encrypted data
    }

    /**
     * Encrypt data from block.
     */
    public static function decryptData($encryptedData, $key)
    {
        list($encryptedData, $salt, $iv) = explode('::', base64_decode($encryptedData), 3);
        return openssl_decrypt($encryptedData, 'aes-256-cbc', $key, 0, $iv);
    }

    /**
     * Calculating the merkle root.
     */
    public static function calcMerkleRoot($transactions)
    {
        $hashes = array_map(function ($transaction) {
            return hash('sha256', json_encode($transaction, JSON_UNESCAPED_UNICODE));
        }, $transactions);

        while (count($hashes) > 1) {
            $levelHashes = [];
            for ($i = 0; $i < count($hashes); $i += 2) {
                $leftHash = $hashes[$i];
                $rightHash = ($i + 1 < count($hashes)) ? $hashes[$i + 1] : $leftHash;
                $levelHashes[] = hash('sha256', $leftHash . $rightHash);
            }
            $hashes = $levelHashes;
        }

        return $hashes[0];
    }


    /**
     * Storing block into the blockchain.
     */
    public static function storeBlockchain($blockchain)
    {
        $filename = storage_path('blockchain.dat');
        $data = serialize($blockchain);
        file_put_contents($filename, $data);
    }

    /**
     * Loading the distributed ledger.
     */
    public static function loadBlockchain()
    {
        $filename = storage_path('blockchain.dat');

        if (file_exists($filename)) {
            $data = file_get_contents($filename);
            return unserialize($data);
        }

        return [];
    }
}
