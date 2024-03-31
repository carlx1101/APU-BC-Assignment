<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Encryption\Encrypter;

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

    public static function encryptData($data, $key)
    {
        $encrypter = new Encrypter($key, 'AES-256-CBC');
        return $encrypter->encrypt($data);
    }

    public static function decryptData($encryptedData, $key)
    {
        $encrypter = new Encrypter($key, 'AES-256-CBC');
        return $encrypter->decrypt($encryptedData);
    }

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


    public static function storeBlockchain($blockchain)
    {
        $filename = storage_path('blockchain.dat');
        $data = serialize($blockchain);
        file_put_contents($filename, $data);
    }

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
