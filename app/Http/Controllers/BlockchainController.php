<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Blockchain;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class BlockchainController extends Controller
{
    private $symmetricKey;
    private $publicKey;
    private $privateKey;

    /**
     *  Create encryption key on initialization.
     */
    public function __construct()
    {
        // Generate Symmetric Key
        $this->symmetricKey = Config::get('blockchain.symmetric_key');

        // Generate Public/Private Key Pair
        $this->privateKey =
            Session::get('private_key');

        $this->publicKey =
            Session::get('public_key');
    }

    /**
     * Generate Genesis Block.
     */
    public static function generateGenesisBlock()
    {
        $genesis_block = [
            'index' => 0,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'prev_hash' => 0,
            'transactions' => [
                'data' => 'Initial_Data',
                'encrypted_symmetric_key' => 'Initial_Key',
                'digital_signature' => 'Initial_Signature'
            ],
            'sender_uuid' => 'Initial UUID',
            'shared_publicly' => true
        ];

        $info = implode("+", [
            $genesis_block['index'],
            $genesis_block['prev_hash'],
            strtotime($genesis_block['timestamp'])
        ]); // Create dummy data for genesis block

        $genesis_block['current_hash'] = hash('sha256', $info); // Get Current hash value

        $transactions = [$genesis_block['transactions']['data'], $genesis_block['transactions']['encrypted_symmetric_key'], $genesis_block['transactions']['digital_signature']];

        $genesis_block['transactions']['merkle_root'] = Blockchain::calcMerkleRoot($transactions); // Generate Merkle Root

        // Store in Blockchain
        $blockchain = [$genesis_block];
        Blockchain::storeBlockchain($blockchain);

        return $genesis_block;
    }

    /**
     * Create Digital Signature
     */
    private function signData($data, $privateKey)
    {
        $data = json_encode($data); // Change to json string.

        // Format Private Key
        $privateKey =
            "-----BEGIN PRIVATE KEY-----\n" . wordwrap($privateKey, 64, "\n", true) . "\n-----END PRIVATE KEY-----";

        openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);
        return base64_encode($signature);
    }

    /**
     * Get previous hash
     */
    private function getPrevHash()
    {
        $blockchain = Blockchain::loadBlockchain();
        $lastBlock = end($blockchain);

        if ($lastBlock) {
            return $lastBlock['current_hash'];
        }

        return '';
    }

    /**
     *  Add block into Blockchain.
     */
    public function addBlock($data)
    {
        // Encrypt Data and create digital signature
        $encryptedData = [
            'data' =>
            Blockchain::encryptData($data['data'], $this->symmetricKey),
            'encrypted_symmetric_key' => isset($data['recipientPublicKey'])
                ? Blockchain::encryptAsymmetric($this->symmetricKey, Blockchain::formatPublicKeyToPEM($data['recipientPublicKey']))
                : $this->symmetricKey,
            'digital_signature' => $this->signData($data['data'], $this->privateKey),
        ];

        $block = [
            'index' => count(Blockchain::loadBlockchain()) + 1,
            'timestamp' => now()->format('Y-m-d H:i:s'),
            'prev_hash' => $this->getPrevHash(),
            'transactions' => $encryptedData,
            'sender_uuid' => auth()->user()->uuid,
            'shared_publicly' => isset($data['recipientPublicKey']) ? false : true,
        ];

        // Hash Block
        $block['current_hash'] = Blockchain::hashBlock($block);

        // Calculate Merkle Root
        $transactions = [$block['transactions']['data'], $block['transactions']['encrypted_symmetric_key'], $block['transactions']['digital_signature']];
        $merkle_root = Blockchain::calcMerkleRoot($transactions);

        $block['transactions']['merkle_root'] = $merkle_root;

        // Add Block to Blockchain
        $blockchain = Blockchain::loadBlockchain();
        $blockchain[] = $block;

        // Store Updated Blockchain
        Blockchain::storeBlockchain($blockchain);

        return $block;
    }

    /**
     *  Get Block from Blockchain.
     */
    public function getBlock($block_hash)
    {
        $blockchain = Blockchain::loadBlockchain();

        foreach ($blockchain as $block) {
            if ($block['current_hash'] === $block_hash) {
                // Get Sender Public Key
                $user = User::where('uuid', $block['sender_uuid'])->firstOrFail();
                $senderPublicKey = Storage::get("keys/{$user->uuid}/{$user->role}_public_key.pem");

                if (!$block['shared_publicly']) {

                    $encrypted_symmetric_key = str_replace('"', '', Blockchain::decryptAsymmetric($block['transactions']['encrypted_symmetric_key'], Blockchain::formatPrivateKeyToPEM($this->privateKey)));

                    // Decrypt Data
                    $decryptedData = [
                        'data' => Blockchain::decryptData($block['transactions']['data'], $encrypted_symmetric_key),
                        'encrypted_symmetric_key' => $encrypted_symmetric_key,
                        'digital_signature' => $block['transactions']['digital_signature']
                    ];
                } else {
                    // Decrypt Data
                    $decryptedData = [
                        'data' => Blockchain::decryptData($block['transactions']['data'], $block['transactions']['encrypted_symmetric_key']),
                        'encrypted_symmetric_key' => $block['transactions']['encrypted_symmetric_key'],
                        'digital_signature' => $block['transactions']['digital_signature']
                    ];
                }


                // Verify Digital Signature
                $isSignatureValid = Blockchain::verifySignature($decryptedData['data'], $decryptedData['digital_signature'], $senderPublicKey);

                !$isSignatureValid ? abort(403, "You do not have permission to view this message.") : '';

                return ['decrypted_data' => $decryptedData['data'], 'sender_uuid' => $block['sender_uuid']];
            }
        }

        return abort(404);
    }
}
