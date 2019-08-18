<?php

// SSLCommerz configuration

return [
    'projectPath' => 'http://127.0.0.1:8000',
    // For Sandbox, use "https://sandbox.sslcommerz.com"
    // For Live, use "https://securepay.sslcommerz.com"
    'apiDomain' => env("API_DOMAIN_URL"),
    'apiCredentials' => [
        'store_id' => "mistr5d24311c9b87c",
        'store_password' => "mistr5d24311c9b87c@ssl",
    ],
    'apiUrl' => [
        'make_payment' => "/gwprocess/v4/api.php",
        'transaction_status' => "/validator/api/merchantTransIDvalidationAPI.php",
        'order_validate' => "/validator/api/validationserverAPI.php",
        'refund_payment' => "/validator/api/merchantTransIDvalidationAPI.php",
        'refund_status' => "/validator/api/merchantTransIDvalidationAPI.php",
    ],
    'connect_from_localhost' => env("IS_LOCALHOST", true), // For Sandbox, use "true", For Live, use "false"
    'success_url' => '/success',
    'failed_url' => '/fail',
    'cancel_url' => '/cancel',
    'ipn_url' => '/ipn',
];
