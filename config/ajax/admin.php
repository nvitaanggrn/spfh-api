<?php
return [
  'auth' => [
    'cookie' => [
      'name' => 'spfh-admin',
      'path' => '/',
      'secure' => false,
      'domain' => null
    ],
    'encryption' => [
      /**
       * iv = base64_encode(openssl_random_pseudo_bytes(openssl_cipher_iv_length('AES-256-CBC')))
       * key = base64_encode(openssl_random_pseudo_bytes(32))
       */
      'iv' => 'osSCrp3aI59b2oxYu1F04w==',
      'key' => 'jBK2byYM4UKzAE1WEshDwr0zzw4LcT0cd9tBEi3TmBs=',
      'cipher' => 'AES-256-CBC'
    ],
    'service' => [
      'name' => App\Ajax\Auth\AuthServiceProvider::DEFAULT_SERVICE_NAME,
      'class' => App\Ajax\Spfh\Admin\Auth\AuthService::class
    ],
    'model' => [
      'lifetime' => 2592000,
      'random_type' => App\Core\Random::TYPE_BASE64URL,
      'random_length' => 64,
      'user_type_id' => App\Db\Spfh\UserType::TYPE_ADMIN_ID
    ]
  ],
  'providers' => [
    Carbon\Laravel\ServiceProvider::class,
    App\Ajax\Auth\AuthServiceProvider::class
  ],
  'middleware' => [
    'stack' => [
      App\Core\Cookie\QueueMiddleware::class
    ],
    'routes' => [
      'auth.token' => App\Core\Auth\TokenMiddleware::class,
      'auth.authorized_token' => App\Core\Auth\AuthorizedTokenMiddleware::class,
      'auth.unauthorized_token' => App\Core\Auth\UnauthorizedTokenMiddleware::class
    ]
  ],
  'validation' => [
    'rules' =>  [],
    'implicit_rules' => [],
    'dependent_rules' => []
  ]
];