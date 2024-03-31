<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Blockchain Configuration
    |--------------------------------------------------------------------------
    |
    | This file is used to store the blockchain configuration, including the
    | symmetric key and public/private key pair.
    |
    */

    'symmetric_key' => env('BLOCKCHAIN_SYMMETRIC_KEY'),

    'private_key' => env('BLOCKCHAIN_PRIVATE_KEY'),

    'public_key' => env('BLOCKCHAIN_PUBLIC_KEY'),

];
